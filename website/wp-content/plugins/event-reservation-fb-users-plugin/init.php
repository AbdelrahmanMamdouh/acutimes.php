<?php

/*
  Plugin Name: Event Reservation Handler
  Description: Handles the reservation Requests
  Author: BNI
  Version: 1.0
 */

require_once __DIR__ . '/config.php';
add_action('template_redirect', 'my_plugin_template_redirect_intercept');

function my_plugin_template_redirect_intercept() {
    global $wp_query;
    if ($wp_query->get('reserve')) {
        $eventId = $wp_query->get('event');
        $FEUP = new FEUP_User();
        if ($FEUP->Is_Logged_In()) {
            $event = get_post($eventId);
            if ($event == null || $event->post_type != "avent") {
                echo json_encode(array("status" => 'NotFound', "message" => NotFound_MESSAGE));
                exit();
            } else {
                $to = array(get_option('admin_email'), 'hello@youakeem.com');
                $headers = array();
                $fullName = $FEUP->Get_Field_Value('First Name') . " " . $FEUP->Get_Field_Value('Last Name');
                $userEmail = $FEUP->Get_Username();
                $subject = "New CJC reservation from {$userEmail}";
                $attendees = filter_input(INPUT_POST, 'attendees', FILTER_SANITIZE_SPECIAL_CHARS);
                if(!is_numeric($attendees)){
                    echo json_encode(array("status" => 'Illegal', "message" => Illegal_MESSAGE));
                    exit;
                }
                $link = get_permalink($event->ID);
                $message = "User Full Name: {$fullName} \nUser Email: {$userEmail}\nEvent Title : {$event->post_title}\nEvent Link :{$link}\nReservation # : {$attendees}";
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
        //exit;
    }
}

function my_plugin_add_rewrite_rules() {
    $rule = '^reserve/event/([0-9]+)/?$';
    add_rewrite_rule(
            $rule, 'index.php?reserve=1&event=$matches[1]', 'top');
}

add_action('init', 'my_plugin_rewrites_init');

function my_plugin_rewrites_init() {
    add_rewrite_tag('%reserve%', '([0-9]+)');
    add_rewrite_tag('%event%', '([0-9]+)');
    my_plugin_add_rewrite_rules();
}

register_activation_hook(__FILE__, 'my_plugin_activate');

function my_plugin_activate() {
    global $wp_rewrite;
    my_plugin_add_rewrite_rules();
    $wp_rewrite->flush_rules();
}
