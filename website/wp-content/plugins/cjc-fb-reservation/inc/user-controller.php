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
		global $wpdb;
		
		if (isset($_POST['user_status_change'])) {
			$user_id = filter_input(INPUT_POST, 'id');
			$user_fb_id = filter_input(INPUT_POST, 'user_id');

			$user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}fbr_users WHERE id={$user_id} AND user_id='{$user_fb_id}' LIMIT 1 OFFSET 0", ARRAY_A);

			if (isset($user)) {
				$user = $user[0];
				$user_status = filter_input(INPUT_POST, 'user_status');

				$save=array(
					'user_status'=>($user_status == 'null') ? NULL : (int) $user_status
					);
				
				$wpdb->update("{$wpdb->prefix}fbr_users", $save, ["user_id" => $user["user_id"]], ['%d'], ['%s']);
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
				$user = array(
							  	"user_name" => $mobileUser->name,
							  	"user_picture" => $mobileUser->img,
							  	"user_profile" => $mobileUser->link,
							  	"user_email" => $mobileUser->email,
							  	"user_id" => $mobileUser->id
							  );
				return FBR_User::storeMobileUser($user);
			}));
		});
	}
}