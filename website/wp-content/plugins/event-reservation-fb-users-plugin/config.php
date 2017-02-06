<?php

if (!defined('APP_KEY')) {
	define('APP_KEY', get_option('FB-APP-KEY'));
}
if (!defined('APP_SECRET')) {
	define('APP_SECRET', get_option('FB-APTP-SECRE'));
}

if (!defined('NotFound_MESSAGE')) {
	define('NotFound_MESSAGE', __("The event you have select can't be found either you have followed an outdated bookmark or wrong copied link"));
}
if (!defined('Succeeded_MESSAGE')) {
	define('Succeeded_MESSAGE', __("Thanks! Your reservation has been sent."));
}
if (!defined('Error_MESSAGE')) {
	define('Error_MESSAGE', __("Message was not sent. Try Again."));
}
if (!defined('Unauthorized_MESSAGE')) {
	define('Unauthorized_MESSAGE', __("You must be logged in to reserve a ticket(s)"));
}
if (!defined('Illegal_MESSAGE')) {
	define('Illegal_MESSAGE', __("Reservation not sent. Please only use numbers!"));
}
