<?php

// empty data
$FBR_User_data = array(
	'plugin_load'	=> false,
	'is_loged'		=> false,
	'is_approved'	=> false,

	'id'			=> null,
	'fb_id'			=> '',
	'name'			=> '',
	'img'			=> '',
	'email'			=> '',
	'phone'			=> '',
	'profile'		=> '',

	'genre_ids'		=> [],
	'genre_bol'		=> array(),

	'login_url'		=> ''
);


try {
	if( class_exists('FBR_User') ) {
		$FBR_User_data['plugin_load']	 = true;
		$FBR_User_data['login_url']		 = FBR_User::ActiveUser()->getLoginURl(get_permalink());
		$FBR_User_data['is_loged']		 = FBR_User::ActiveUser()->IsLogged();

		if($FBR_User_data['is_loged']){
			$user_detail = FBR_User::ActiveUser()->getUserDetails();

			$FBR_User_data['is_approved'] = FBR_User::ActiveUser()->isApproved();

			$FBR_User_data['fb_id']		 = $user_detail["user_id"];
			$FBR_User_data['name']		 = $user_detail["user_name"];
			$FBR_User_data['img']		 = $user_detail["user_picture"];
			$FBR_User_data['email']		 = $user_detail["user_email"];
			$FBR_User_data['profile']	 = $user_detail["user_profile"];

			//$FBR_User_data['id']		 = null;    <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
			//$FBR_User_data['phone']		 = null;	<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

			$FBR_User_data['genre_bol']	 = FBR_PreferenceController::getByUser($FBR_User_data['id'])->getSelectedAsBoolean();
		}
	}
} catch (Exception $e) {
	var_dump($e);
}
/*
// Dumy data
$FBR_User_data['plugin_load']	= true;
$FBR_User_data['id']			= 5;
$FBR_User_data['fb_id']			= 'asdasdae';
$FBR_User_data['is_loged']		= true;
$FBR_User_data['is_approved']	= true;
$FBR_User_data['name']			= 'Kevin Cheng';
$FBR_User_data['img']			= 'https://s3.amazonaws.com/uifaces/faces/twitter/k/128.jpg';
$FBR_User_data['email']			= 'test@mail.com';
$FBR_User_data['phome']			= '01209874355';
$FBR_User_data['genre_bol']		= array('65'=>true, '62'=>true);
*/