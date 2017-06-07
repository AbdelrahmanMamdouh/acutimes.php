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
				$data = $request->get_params();

				$event_id =  $data["event_id"];
				$user_id =   $data["user_id"];
				$attendees = $data["attendees"];
				$Speacial_request = isset( $data["Speacial_request"] ) ? $data["Speacial_request"] : 'No';
				$request_ttable = isset( $data["request_ttable"] ) ? $data["request_ttable"] : 'NULL';
				$Phone_Number = isset( $data["Phone_Number"] ) ? $data["Phone_Number"] : 'NULL';
				$acessToken = isset( $data["accessToken"] ) ? $data["accessToken"] : NULL;

				return static::Reserve($event_id, $user_id, $attendees, $Speacial_request, $request_ttable,$Phone_Number, $acessToken);
				
			}));
		});	

	}

public static function Reserve($event_id, $user_id, $attendees, $Speacial_request, $request_ttable,$Phone_Number, $accessToken = NULL){

				$reserv = new FBR_Reservation();
		
				$reserv->event_id			= (int) $event_id;
				$reserv->user_id			= (int) $user_id;
				$reserv->attendees			= (int) $attendees;
				$reserv->Speacial_request	= $Speacial_request;
				$reserv->request_ttable		= $request_ttable;
				$reserv->Phone_Number		= $Phone_Number;

				$reserv->accessToken 		= $accessToken;
				if( !is_null($reserv->accessToken) ) {
					$_SESSION['fb_access_token'] = $reserv->accessToken;
				}

				if ( $reserv->isTodayWeekend() ) {
					return json_encode(array("status" => "NotValidDate", "message" => FBR_MESSSAGE_NOT_VALID_DATE));
				}
				
				else if ( !$reserv->isValidUser() ) {
					return json_encode(array("status" => "Unauthorized", "message" => FBR_MESSSAGE_UNAUTORIZED));
					
				} else if ( !$reserv->isValidEvent() ) { 
					return json_encode(array("status" => "NotFound", "message" => FBR_MESSSAGE_NOTFOUND));

				} else if ( !$reserv->isValidAttendess() ) {
					return json_encode(array("status" => "Illegal", "message" => FBR_MESSSAGE_ILLEGAL));

				} else if ( $reserv->isReserved() ) { // if mail sent success
					return json_encode(array("status" => "AlreadyReserved", "message" => FBR_MESSSAGE_ALREADY_RESERVED));

				} else if($reserv->sendMail() && $reserv->create()){
					return json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
				
				} else {
					return json_encode(array("status" => "Error", "message" => FBR_MESSSAGE_ERR));
				}

			}

}