<?php

function cjc_auto_define($key, $value) {
	!defined($key) ? define($key, $value):null;
}

cjc_auto_define('CJC_RFP_PATH', plugin_dir_path( __FILE__ ));

cjc_auto_define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/fb-api/');

cjc_auto_define('APP_KEY',		get_option('FB-APP-KEY'));
cjc_auto_define('APP_SECRET',	get_option('FB-APP-SECRET'));

cjc_auto_define('NotFound_MESSAGE',		__("The event you have select can't be found either you have followed an outdated bookmark or wrong copied link"));
cjc_auto_define('Succeeded_MESSAGE',	__("Thanks! Your reservation has been sent."));
cjc_auto_define('Error_MESSAGE',		__("Message was not sent. Try Again."));
cjc_auto_define('Unauthorized_MESSAGE',	__("You must be logged in to reserve a ticket(s)"));
cjc_auto_define('Illegal_MESSAGE',		__("Reservation not sent. Please only use numbers!"));