<?php

/*
  Plugin Name: CJC Reservation & FB Users
  Description: Handles the reservation requests, facebook login, and keep track of users preference
  Author: Exception Software Solution
  Version: 2.0
 */

!isset($_SESSION) ? session_start():null;

require_once 'config.php';
require_once CJC_RFP_PATH.'fb-api/autoload.php';
require_once CJC_RFP_PATH.'inc/user.php';
require_once 'menu_handler.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';

add_action('template_redirect', 'my_plugin_template_redirect_intercept');

global $wpdb;

function my_plugin_template_redirect_intercept() {
	global $wp_query;

	if ($wp_query->get('reserve')) {
		$eventId = $wp_query->get('event');
		if (!RFB_User::ActiveUser()->IsLogged()) {
			$event = get_post($eventId);
			if ($event == null || $event->post_type != "avent") {
				echo json_encode(array("status" => 'NotFound', "message" => NotFound_MESSAGE));
				exit();
			} else {
				$to = array(get_option('admin_email'), 'hello@youakeem.com');
				$headers = array();
				$userData = RFB_User::ActiveUser()->getUserDetails();
				$subject = "New CJC reservation from {$userData->user_email}";
				$attendees = filter_input(INPUT_POST, 'attendees', FILTER_SANITIZE_SPECIAL_CHARS);
				if (!is_numeric($attendees)) {
					echo json_encode(array("status" => 'Illegal', "message" => Illegal_MESSAGE));
					exit;
				}
				$link = get_permalink($event->ID);
				$message = "User Full Name: {$userData->user_name} \nUser Email: {$userData->user_email}\nEvent Title : {$event->post_title}\nEvent Link :{$link}\nReservation # : {$attendees}\nProfile : {$userData->user_profile}";
				$sent = wp_mail($to, $subject, $message, $headers);

				if ($sent) {
					echo json_encode(array("status" => "Succeeded", "message" => Succeeded_MESSAGE));
					exit();
				}
				echo json_encode(array("status" => "Error", message => Error_MESSAGE));
				exit();
			}
		} else {
			echo json_encode(array("status" => "Unauthorized", "message" => Unauthorized_MESSAGE));
			exit();
		}
	}
}

function my_plugin_add_rewrite_rules() {
	$rule = '^reserve/event/([0-9]+)/?$';
	add_rewrite_rule( $rule, 'index.php?reserve=1&event=$matches[1]', 'top');
}

add_action('init', 'my_plugin_rewrites_init');

function my_plugin_rewrites_init() {
	add_rewrite_tag('%reserve%', '([0-9]+)');
	add_rewrite_tag('%event%', '([0-9]+)');
	my_plugin_add_rewrite_rules();
}

register_activation_hook(CJC_RFP_PATH, 'my_plugin_activate');

function my_plugin_activate() {
	global $wp_rewrite;
	my_plugin_add_rewrite_rules();
	$wp_rewrite->flush_rules();

	RFB_User::CreateDBTable();
}

if (is_admin()) {
	add_action('admin_menu', 'menu_setup');
}

RFB_UserController::UpdateUserStatus();
