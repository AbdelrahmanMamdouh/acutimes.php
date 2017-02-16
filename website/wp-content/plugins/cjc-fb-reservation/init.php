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
// models
require_once FBR_PATH.'inc/user.php';
require_once FBR_PATH.'inc/reservation.php';
// controllers
require_once FBR_PATH.'inc/user-controller.php';
require_once FBR_PATH.'inc/reservation-controller.php';
require_once FBR_PATH.'inc/menu-controller.php';

require_once ABSPATH .'wp-admin/includes/upgrade.php';


register_activation_hook(__FILE__, function () {
	//global $wp_rewrite;
	//my_plugin_add_rewrite_rules();
	//$wp_rewrite->flush_rules();

	FBR_MenuController::onActivate();
	FBR_UserController::onActivate();
	FBR_ResrvationController::onActivate();
});

FBR_MenuController::onInit();
FBR_UserController::onInit();
FBR_ResrvationController::onInit();