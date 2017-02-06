<?php

function registerd_users_handler() {
	global $wpdb;
	$page = filter_input(INPUT_GET, 'type');
	$file = $page;
	switch ($page) {
		case 'approved':
		case 'declined':
		case 'pending':
			require_once __DIR__ . '/html/header.php';
			require_once __DIR__ . "/html/view.{$file}.php";
			require_once __DIR__ . '/html/footer.php';
			break;
		default:
			$file = 'settings';
			require_once __DIR__ . "/html/view.{$file}.php";
			break;
	}
}

function menu_setup() {

	add_menu_page('Facebook Reservation Users', 'Facebook Users', 'manage_options', 'events_reservatoin-users', 'registerd_users_handler', null, '50.7');
	add_submenu_page('events_reservatoin-users', 'Pending Users', 'Pending Users', 'administrator', 'events_reservatoin-users&type=pending', 'registerd_users_handler');
	add_submenu_page('events_reservatoin-users', 'Approved Users', 'Approved Users', 'administrator', 'events_reservatoin-users&type=approved', 'registerd_users_handler');
	add_submenu_page('events_reservatoin-users', 'Declined Users', 'Declined Users', 'administrator', 'events_reservatoin-users&type=declined', 'registerd_users_handler');
}
