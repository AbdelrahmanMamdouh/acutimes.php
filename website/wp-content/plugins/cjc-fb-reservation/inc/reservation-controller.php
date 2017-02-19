<?php

class FBR_ReservationController implements FBR_Controller  {

	static function onActivate(){
		FBR_Reservation::CreateDBTable();
	}

	static function onInit(){
		static::API_POST();
		static::API_GET();
	}


	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/reservation/user/{user_id}
	 * wp-json/fbr/reservation/event/{event_id}
	 * POST
	 * body{ user_id,event_id } json format
	 */
	static function API_GET(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'reservation/user/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){

				return FBR_Reservation::selectMulti('user_id',$request['id']);

			}));
		});	

		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'reservation/event/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){

				return FBR_Reservation::selectMulti('event_id',$request['id']);

			}));
		});	
	}


	/**
	 * wp-json/fbr/reservation/
	 * POST		user_id ,  event_id
	 */
	static function API_POST(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'reservation/', array( 'methods' => 'POST', 'callback' => function($request = null){

				return static::Reserve($_POST["event_id"],$_POST["user_id"],$_POST["attendees"]);
				
			}));
		});	

	}

public static function Reserve($event_id, $user_id, $attendees){

				$reserv = new FBR_Reservation();
		
				$reserv->event_id	= (int) $event_id;
				$reserv->user_id	= (int) $user_id;
				$reserv->attendees	= (int) $attendees;

				if ( !$reserv->isValidUser() ) {
					return json_encode(array("status" => "Unauthorized", "message" => FBR_MESSSAGE_UNAUTORIZED));
					
				} else if ( !$reserv->isValidEvent() ) { 
					return json_encode(array("status" => 'NotFound', "message" => FBR_MESSSAGE_NOTFOUND));

				} else if ( !$reserv->isValidAttendess() ) {
					return json_encode(array("status" => 'Illegal', "message" => FBR_MESSSAGE_ILLEGAL));

				} else if ( $reserv->isReserved() ) { // if mail sent success
					return json_encode(array("status" => "AlreadyReserved", 'message' => 'you have already reserved'));

				} else if($reserv->sendMail() && $reserv->create()){
					return json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
				
				} else {
					return json_encode(array("status" => "Error", 'message' => FBR_MESSSAGE_ERR));
				}

			}

}