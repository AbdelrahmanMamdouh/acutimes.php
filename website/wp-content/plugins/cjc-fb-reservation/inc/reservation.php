<?php
class FBR_Reservation {

	public $reserv_date;
	public $user_id;
	public $event_id;
	public $state = 0;
	public $attendees;
	public $request_ttable;
	public $Phone_Number;
	public $Speacial_request;
	public $accessToken;

	public static $DataFormat = 

	array(
		'reserv_date'	=> '%s',
		'user_id'		=> '%d',
		'event_id'		=> '%d',
		'state'			=> '%d',
		'attendees'		=> '%d',
		'request_ttable'=> '%s',
		'Speacial_request'=> '%s',	
		'Phone_Number'=> '%s'
	);

	public static $PK = ['user_id', 'event_id'];

	const STATE_PENDING = 0;
	const STATE_APPROVED = 1;
	const STATE_REJECTED = 2;

	static function GetDBTable(){
		global $wpdb;
		return $wpdb->prefix . "fbr_reservations";
	}


	static function CreateDBTable(){
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$table_name = static::GetDBTable();

		dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
						`user_id` INT NOT NULL,
						`event_id` INT NOT NULL,
						`state` INT NOT NULL,
						`attendees` INT NOT NULL,
						'request_ttable' TEXT,
						'Speacial_request' TEXT,		
						'Phone_Number' TEXT,
						`reserv_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY (`user_id`,`event_id`)
					) $charset_collate;");
	}

	private function parseData($data){
		$this->reserv_date = $data->reserv_date;
		$this->user_id = (int) $data->user_id;
		$this->event_id = (int) $data->event_id;
		$this->state = (int) $data->state;
	}

	static private function parseMultiData($data){
		$result = [];
		foreach($data as $event){
			$temp = new static();
			$temp->parseData($event);
			array_push($result, $temp);
		}
		return $result;
	}

	function create(){
		global $wpdb;

		return $wpdb->insert(
			static::GetDBTable(), 
			array(
				'user_id'			=> $this->user_id,
				'event_id'			=> $this->event_id,
				'state'				=> $this->state,
				'attendees'			=> $this->attendees,
				'request_ttable'	=> $this->request_ttable,
				'Speacial_request'	=> $this->Speacial_request,
				'Phone_Number'	=> $this->Phone_Number
			),
			['%d', '%d', '%d', '%d', '%s', '%s', '%s']);
	}

	function update(){
		return $wpdb->update( 
			static::GetDBTable(), 
			array(
				'state' 			=>	$this->state,
				'attendees' 		=>	$this->attendees,
				'request_ttable'	=> $this->request_ttable,
				'Speacial_request'	=> $this->Speacial_request,
				'Phone_Number'	=> $this->Phone_Number
			),
			array( 
				'user_id'	=> $this->user_id,
				'event_id'	=> $this->event_id 
			), 
			['%d', '%d', '%s', '%s', '%s'],
			['%d', '%d'] 
		);
	}

	function select($user_id, $event_id){
		global $wpdb;
		$this->parseData($wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable()." WHERE user_id = %d AND event_id = %d",
			$user_id, $event_id), object));

	}
	function isReserved(){
		global $wpdb;
		$result = $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable()." WHERE user_id = %d AND event_id = %d",
			$this->user_id, $this->event_id), object);

		return isset($result) && count( $result)>0;
	}

	public static function selectMulti($att = null, $key = null){
		global $wpdb;

		return static::parseMultiData( $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable()." WHERE {$att} = ".static::$DataFormat[$att],
			$key), object));
	}

	function sendMail(){

		$headers = array();
		$to = array('reservations@cairojazzclub.com', FBR_NOTIFY_EMAIL);
		$event = $this->getEvent();
		$userData = FBR_FBhandler::Init()->getUser();
		$subject = "New CJC reservation from {$userData->user_email}";
		$link = get_permalink($this->event_id);

		$message = 	"User Full Name : {$userData->user_name}\n".
					"User Email     : {$userData->user_email}\n".
					"Profile        : {$userData->user_profile}\n".
					"Event Title    : {$event->post_title}\n".
					"Event Link     : {$link}\n".
					"Attendees      : {$this->attendees}\n".
					"Request Table      : {$this->request_ttable}\n".	
					"Phone Number      : {$this->Phone_Number}\n".
					"Speacial Request      : {$this->Speacial_request}";

		if(wp_mail($to, $subject, $message, $headers)){
			return true ;
		} else {


			$mail = new PHPMailer();

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'poparab11@gmail.com';                 // SMTP username
			$mail->Password = '33151732';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('poparab11@gmail.com', 'Mailer');
			$mail->addAddress('reservations@cairojazzclub.com');
			//$mail->addAddress(get_option('admin_email'));
			$mail->addAddress(FBR_NOTIFY_EMAIL);
			//$mail->addReplyTo('info@example.com', 'Information');


			//$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = $message;

			if(!$mail->send()) {
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
		}
	}

	function getEvent(){
		return get_post($this->event_id);
	}

	function getUser(){

	}

	function isValidEvent(){
		$ev = $this->getEvent();
		return $ev != null && $ev->post_type == "avent" ; // && event rervation is on
	}

	function isValidUser(){
		return FBR_FBhandler::Init()->IsLogged();// && has permission
	}

	function isValidAttendess(){
		return is_numeric($this->attendees) && $this->attendees >0;
	}
}