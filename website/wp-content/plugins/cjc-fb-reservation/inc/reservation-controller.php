<?php

class FBR_ReservationController implements FBR_Controller  {

	static function onActivate(){
		FBR_Reservation::CreateDBTable();
	}

	static function onInit(){
		static::API_Reserve();
		static::API_getReservation();
	}


	/**
	 * later should remove the id and use FB user
	 * wp-json/fbr/reservation/user/{user_id}
	 * POST
	 * body{ user_id,event_id } json format
	 */
	static function API_getReservation(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'reservation/user/(?P<id>\d+)', array( 'methods' => 'GET', 'callback' => function($request = null){
				$user_id = 1;//FBR_User::ActiveUser()->getUserDetails()["user_id"];
				return FBR_Reservation::selectMulti('user_id',$user_id);
			}));
		});	

	}





	/**
	 * wp-json/fbr/reservation/
	 * POST
	 * body{ user_id,event_id } json format
	 */
	static function API_Reserve(){
		
		add_action( 'rest_api_init', function() {
			register_rest_route( 'fbr/', 'reservation/', array( 'methods' => 'POST', 'callback' => function($request = null){

				$data = json_decode( file_get_contents('php://input') );
				
				$reserv = new FBR_Reservation();
				$reserv->event_id = $data->user_id;
				$reserv->user_id = $user->event_id;
				$reserv->create();
				$reserv->sendMail();
				
			}));
		});	

	}

	static function Reserv(){
		global $wp_query;

		if ($wp_query->get('reserve')) {
			$eventId = $wp_query->get('event');
			if (!FBR_User::ActiveUser()->IsLogged()) {

				$event = get_post($eventId);
				if ($event == null || $event->post_type != "avent") {
					return json_encode(array("status" => 'NotFound', "message" => FBR_MESSSAGE_NOTFOUND));

				} else {
					$to = array(get_option('admin_email'), 'hello@youakeem.com');
					$headers = array();
					$userData = FBR_User::ActiveUser()->getUserDetails();
					$subject = "New CJC reservation from {$userData->user_email}";
					$attendees = filter_input(INPUT_POST, 'attendees', FILTER_SANITIZE_SPECIAL_CHARS);
					if (!is_numeric($attendees)) {
						return json_encode(array("status" => 'Illegal', "message" => FBR_MESSSAGE_ILLEGAL));
					}
					$link = get_permalink($event->ID);
					$message = "User Full Name: {$userData->user_name} \nUser Email: {$userData->user_email}\nEvent Title : {$event->post_title}\nEvent Link :{$link}\nReservation # : {$attendees}\nProfile : {$userData->user_profile}";
					$sent = wp_mail($to, $subject, $message, $headers);

					if ($sent) {
						return json_encode(array("status" => "Succeeded", "message" => FBR_MESSSAGE_SUCCESS));
					}
					return json_encode(array("status" => "Error", message => FBR_MESSSAGE_ERR));
				}
			} else {
				return json_encode(array("status" => "Unauthorized", "message" => FBR_MESSSAGE_UNAUTORIZED));
			}
		}
	}

}