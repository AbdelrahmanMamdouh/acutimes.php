<?php

/*
  Plugin Name: CJC Facebook Reservation
  Description: Handles the reservation requests, facebook login, and keep track of users preference
  Author: Exception Software Solution
  Version: 2.0
 */

!isset($_SESSION) ? session_start():null;

require_once 'config.php';
require_once FBR_PATH.'fb-api/autoload.php';
require_once FBR_PATH.'inc/user.php';
require_once FBR_PATH.'inc/reservation.php';
require_once FBR_PATH.'inc/user-controller.php';
require_once FBR_PATH.'menu_handler.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';


register_activation_hook(FBR_PATH, 
	function () {
		global $wp_rewrite;
		//my_plugin_add_rewrite_rules();
		$wp_rewrite->flush_rules();

		FBR_User::CreateDBTable();
		FBR_Reservation::CreateDBTable();
	}
);

if (is_admin()) {
	add_action('admin_menu', 'menu_setup');
}

FBR_UserController::UpdateUserStatus();
