<?php

class FBR_UserController {


	/**
	 * update user data from post
	 */
	static function UpdateUserStatus(){
		global $wpdb;
		
		if (isset($_POST['user_status_change'])) {
			$user_id = filter_input(INPUT_POST, 'id');
			$user_fb_id = filter_input(INPUT_POST, 'user_id');

			$user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}fbr_users WHERE id={$user_id} AND user_id='{$user_fb_id}' LIMIT 1 OFFSET 0", ARRAY_A);

			if (isset($user)) {
				$user = $user[0];
				$user_status = filter_input(INPUT_POST, 'user_status');
				$user_status = ($user_status == 'null') ? NULL : $user_status;
				$user['user_status'] = $user_status;
				
				$wpdb->update("{$wpdb->prefix}fbr_users", $user, ["user_id" => $user["user_id"]], ['%s', '%s', '%s', '%s', '%s', '%s', '%d'], ['%s']);
			}
		}
	}


}