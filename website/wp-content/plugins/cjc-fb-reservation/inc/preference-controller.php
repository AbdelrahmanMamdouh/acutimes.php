<?php

class FBR_PreferenceController implements FBR_Controller  {

	static function onActivate(){
		FBR_preference::CreateDBTable();
	}

	static function onInit(){
		static::API_GETpreferences();
		static::API_POSTpreferences();
	}


	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/preference/{user_id}
	 * wp-json/fbr/preference/all
	 * GET
	 */
	static function API_GETpreferences(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/user/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){
					
					return FBR_preference::selectMulti('user_id',$request['id']);

			}));
		});	

		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/all', array( 'methods' => 'GET', 'callback' => function($request = null){

					return get_terms( 'genre' );

			}));
		});	

	}

	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/preference/{user_id}
	 * POST
	 * [prefs : JSON ARRAY]
	 */
	static function API_POSTpreferences(){
	
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'preference/user/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){
					
					if( FBR_preference::selectMulti($request['id'],json_decode( $_POST['prefs'])) ){
						return json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
					} else {
						return json_encode(array("status" => "Error", 'message' => FBR_MESSSAGE_ERR));
					}
					
			}));
		});
	
	}


}