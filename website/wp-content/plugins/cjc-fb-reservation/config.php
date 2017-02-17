<?php

function FBR_define($key, $value) {
	$value = $value ? $value : '';
	!defined($key) ? define($key, $value):null;
}

FBR_define('FBR_PATH', 					plugin_dir_path( __FILE__ ));

FBR_define('FACEBOOK_SDK_V4_SRC_DIR',	FBR_PATH.'/fb-api/');

FBR_define('FBR_FB_APP_KEY',			get_option('FBR_FB_APP_KEY'));
FBR_define('FBR_FB_APP_SECRET',			get_option('FBR_FB_APP_SECRET'));
FBR_define('FBR_NOTIFY_EMAIL',			get_option('FBR_NOTIFY_EMAIL'));

FBR_define('FBR_MESSSAGE_NOTFOUND',		__("The event you have select can't be found either you have followed an outdated bookmark or wrong copied link"));
FBR_define('FBR_MESSSAGE_SUCCESS',		__("Thanks! Your reservation has been sent."));
FBR_define('FBR_MESSSAGE_ERR',			__("Message was not sent. Try Again."));
FBR_define('FBR_MESSSAGE_UNAUTORIZED',	__("You must be logged in to reserve a ticket(s)"));
FBR_define('FBR_MESSSAGE_ILLEGAL',		__("Reservation not sent. Please only use numbers!"));