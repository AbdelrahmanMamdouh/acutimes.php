<?php

class FBR_MenuController {

	static function onActivate(){ }

	static function onInit(){
		static::MenuSetup();
	}

	static function MenuSetup() {

			if (is_admin()) {
				add_action('admin_menu', function(){
					
					add_menu_page('Facebook Reservation Users', 'Facebook Users', 'manage_options', 'events_reservatoin-users', array(static::class, 'RegisterdUsersHandler'), null, '50.7');
					add_submenu_page('events_reservatoin-users', 'Pending Users', 'Pending Users', 'administrator', 'events_reservatoin-users&type=pending', array(static::class, 'RegisterdUsersHandler'));
					add_submenu_page('events_reservatoin-users', 'Approved Users', 'Approved Users', 'administrator', 'events_reservatoin-users&type=approved', array(static::class, 'RegisterdUsersHandler'));
					add_submenu_page('events_reservatoin-users', 'Declined Users', 'Declined Users', 'administrator', 'events_reservatoin-users&type=declined', array(static::class, 'RegisterdUsersHandler'));

				});
			}
			
		}

	static function RegisterdUsersHandler() {

		$page = filter_input(INPUT_GET, 'type');
		$file = $page;
		switch ($page) {
			case 'approved':
			case 'declined':
			case 'pending':
				require_once FBR_PATH.'/html/header.php';
				require_once FBR_PATH."/html/view.{$file}.php";
				require_once FBR_PATH.'/html/footer.php';
				break;
			default:
				$file = 'settings';
				require_once FBR_PATH."/html/view.{$file}.php";
				break;
		}

	}

}