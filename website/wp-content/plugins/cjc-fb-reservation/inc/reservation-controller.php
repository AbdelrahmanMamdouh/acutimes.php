<?php

class FBR_ResrvationController {

	static function onActivate(){
		FBR_Reservation::CreateDBTable();
	}

	static function onInit(){
		
	}

	static function API_Reserve($user, $event){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'cjc/', 'metaslider/images/(?P<id>\d+)', array(
				'methods' => 'GET',
				'callback' => function($request){
					//=======================================
					$reserv = new static();
					//$reserv->event_id = $event->;
					//$reserv->user_id = $user->;
					$reserv->create();
					$reserv->sendMail();
					//=======================================
				}
			) );
		} );	

	}

}