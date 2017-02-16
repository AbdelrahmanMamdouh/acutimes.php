<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// models
require_once FBR_PATH.'inc/user.php';
require_once FBR_PATH.'inc/reservation.php';
require_once FBR_PATH.'inc/preference.php';

// controllers
require_once FBR_PATH.'inc/controller-interface.php';
require_once FBR_PATH.'inc/user-controller.php';
require_once FBR_PATH.'inc/reservation-controller.php';
require_once FBR_PATH.'inc/preference-controller.php';
require_once FBR_PATH.'inc/menu-controller.php';