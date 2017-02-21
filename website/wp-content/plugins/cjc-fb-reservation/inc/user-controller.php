<?php

class FBR_UserController implements FBR_Controller  {

	static function onActivate(){
		FBR_User::CreateDBTable();
	}

	static function onInit(){
		static::POST_UpdateUserStatus();
		static::API_POST_MobileUserAccessToken();
	}

	/**
	 * update user data from post
	 */
	static function POST_UpdateUserStatus(){
		
		if (isset($_POST['user_status_change'])) {

			$usr = new FBR_User();
			$usr->id = (int) filter_input(INPUT_POST, 'id');
			$usr->user_id = filter_input(INPUT_POST, 'user_id');

			$usr->select();
			
			$status = filter_input(INPUT_POST, 'user_status');
			$usr->user_status = $status == 'null' ? NULL : (int) $status;
			
			if(isset($usr->id)){
				$usr->update();
			}

		}
	}

	/**
	 * wp-json/fbr/mobile/users/
	 * POST
	 * body{ users } json format
	 */
	static function API_POST_MobileUserAccessToken() {
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'mobile/users/', array( 'methods' => 'POST', 'callback' => function($request = null) {
				$data = json_decode( file_get_contents('php://input') );
				$mobileUser = $data->user;

				$usr->user_name = $mobileUser->name;
				$usr->user_picture = $mobileUser->img;
				$usr->user_profile = $mobileUser->link;
				$usr->user_email = $mobileUser->email;
				$usr->user_id = $mobileUser->id;

				return $usr->create();
			}));
		});
	}
}