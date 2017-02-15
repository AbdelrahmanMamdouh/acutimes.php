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
require_once CJC_RFP_PATH.'inc/user-controller.php';
require_once 'menu_handler.php';
require_once ABSPATH . 'wp-admin/includes/upgrade.php';


register_activation_hook(CJC_RFP_PATH, 
	function () {
		global $wp_rewrite;
		my_plugin_add_rewrite_rules();
		$wp_rewrite->flush_rules();

		RFB_User::CreateDBTable();
	}
);

if (is_admin()) {
	add_action('admin_menu', 'menu_setup');
}

RFB_UserController::UpdateUserStatus();
