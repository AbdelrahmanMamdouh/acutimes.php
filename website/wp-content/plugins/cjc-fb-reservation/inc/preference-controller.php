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

		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/user/merged/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){

					$Genres = FBR_Preference::getAllGenres();
					$Selected = static::getByUser($request['id'])->getSelectedAsBoolean();

					foreach ($Genres as $key => $gen) {
						$Genres[$key]->isChecked = isset($Selected[$gen->term_id]) ? true : false;
					}

					return $Genres;
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

				// get the users by email
				$userList = FBR_User::selectMulti('user_email',$data->userFields->foote_email );
				
				// if the result has 1 user or more use the first one else make a new one
				$user = (count($userList)>=1) ? $userList[0] : new FBR_User();

				$user->user_email = $data->userFields->foote_email;
				$user->phone = $data->userFields->foote_phone;
				$user->address = $data->userFields->foote_address;
				$user->age = $data->userFields->foote_age;
				
				$user->save();

				if( isset($user->id)){
					static::UpdatePrefs($user->id, $data->checkBoxes);
					return array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS);
				} else {
					return array("status" => "Error", 'message' => FBR_MESSSAGE_ERR);
				}
					
			}));
		});
	
	}

	public static function UpdatePrefs($user_id, $pref_ids){
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
