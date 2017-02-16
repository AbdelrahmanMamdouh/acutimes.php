<?php

add_action('template_redirect', 'my_plugin_template_redirect_intercept');

global $wpdb;

function my_plugin_template_redirect_intercept() {
	global $wp_query;

	if ($wp_query->get('reserve')) {
		$eventId = $wp_query->get('event');
		if (!FBR_User::ActiveUser()->IsLogged()) {
			$event = get_post($eventId);
			if ($event == null || $event->post_type != "avent") {
				echo json_encode(array("status" => 'NotFound', "message" => FBR_MESSSAGE_NOTFOUND));
				exit();
			} else {
				$to = array(get_option('admin_email'), 'hello@youakeem.com');
				$headers = array();
				$userData = FBR_User::ActiveUser()->getUserDetails();
				$subject = "New CJC reservation from {$userData->user_email}";
				$attendees = filter_input(INPUT_POST, 'attendees', FILTER_SANITIZE_SPECIAL_CHARS);
				if (!is_numeric($attendees)) {
					echo json_encode(array("status" => 'Illegal', "message" => FBR_MESSSAGE_ILLEGAL));
					exit;
				}
				$link = get_permalink($event->ID);
				$message = "User Full Name: {$userData->user_name} \nUser Email: {$userData->user_email}\nEvent Title : {$event->post_title}\nEvent Link :{$link}\nReservation # : {$attendees}\nProfile : {$userData->user_profile}";
				$sent = wp_mail($to, $subject, $message, $headers);

				if ($sent) {
					echo json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
					exit();
				}
				echo json_encode(array("status" => "Error", message => FBR_MESSSAGE_ERR));
				exit();
			}
		} else {
			echo json_encode(array("status" => "Unauthorized", "message" => FBR_MESSSAGE_UNAUTORIZED));
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