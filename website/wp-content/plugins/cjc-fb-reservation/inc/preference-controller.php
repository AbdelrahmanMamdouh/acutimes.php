<?php

class FBR_PreferenceController implements FBR_Controller  {

	static function onActivate(){
		FBR_preference::CreateDBTable();
	}

	static function onInit(){
		static::API_GET();
		static::API_POST();
	}


	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/preference/{user_id}
	 * wp-json/fbr/preference/all
	 * GET
	 */
	private static function API_GET(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/user/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){
					
					return static::getByUser($request['id'])->pref_ids;

			}));
		});

		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/all', array( 'methods' => 'GET', 'callback' => function($request = null){

					return FBR_Preference::getAllGenres();

			}));
		});	

	}

	public static function getByUser($user_id){
		$pref = new FBR_Preference();
		$pref->select('user_id', $user_id);
		return $pref;
	}




	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/preference/{user_id}
	 * POST
	 * [prefs : JSON ARRAY]
	 */
	private static function API_POST(){
	
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/user/', array( 'methods' => 'POST', 'callback' => function($request = null){
				global $wpdb;
				$data = json_decode( file_get_contents('php://input') );

				$checkBoxes = $data->checkBoxes;
				$userFields = array(
						  		"user_email" => $data->userFields->foote_email,
							  	"phone" => $data->userFields->foote_phone,
							  	"address" => $data->userFields->foote_address,
							  	"age" => $data->userFields->foote_age
							  );

				if (isset($userFields['user_email'])) {
					$userId = FBR_User::getUserIdByEmail($userFields['user_email']);

					if (! isset($userId) ) {
						$userId = FBR_User::storeUserFields($userFields);
					}
				}

				if (isset($userId)) {
					if( static::Update($userId, $checkBoxes) ){
							return json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
						} else {
							return json_encode(array("status" => "Error", 'message' => FBR_MESSSAGE_ERR));
						} 
				}
					
			}));
		});
	
	}

	public static function Update($user_id, $pref_ids){
		$pref = new FBR_Preference();
		$pref->user_id = $user_id;
		$pref->pref_ids = $pref_ids;
		return $pref->create();
	}

	public static function getGenreName($user_id){
		$Genres = static::getByUser($user_id)->getSelectedGenre();
		$ret = [];
		foreach ($Genres as $gen) {
			array_push($ret, $gen->name);
		}
		return $ret;
	}
}