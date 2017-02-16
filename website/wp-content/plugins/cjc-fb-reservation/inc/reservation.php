<?php
class FBR_Reservation {

	public $reserv_date;
	public $user_id;
	public $event_id;
	public $state = 0;
	public $attendees;

	public static $DataFormat = 
	array(
		'reserv_date'	=> '%s',
		'user_id'		=> '%d',
		'event_id'		=> '%d',
		'state'			=> '%d',
		'attendees'		=> '%d'
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
						`reserv_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY (`user_id`,`event_id`)
					) $charset_collate;");
	}

	private function parseData($data){
		$this->reserv_date = $data['reserv_date'] ? new Date($data['reserv_date']) : null;
		$this->user_id = (int) $data['user_id'];
		$this->event_id = (int) $data['event_id'];
		$this->state = (int) $data['state'];
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
				'user_id'		=> $this->user_id,
				'state'			=> $this->state,
				'attendees'		=> $this->attendees
			),
			['%d', '%d', '%d']);
	}

	function update(){
		return $wpdb->update( 
			static::GetDBTable(), 
			array(
				'state' 	=>	$this->state,
				'attendees' =>	$this->attendees
			),
			array( 
				'user_id'	=> $this->user_id,
				'event_id'	=> $this->event_id 
			), 
			['%d', '%d'],
			['%d', '%d'] 
		);
	}

	function select($user_id, $event_id){
		global $wpdb;
		$this->parseData($wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable." WHERE user_id = %d AND event_id = %d",
			$user_id, $event_id), object));

	}

	public static function selectMulti($att = null, $key = null){
		global $wpdb;

		return static::parseMultiData( $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable." WHERE {$att} = ".static::$DataFormat[$att],
			$key), object));
	}

	function sendMail(){

		$headers = array();
		$to = array(get_option('admin_email'), 'hello@youakeem.com');
		
		$userData = FBR_User::ActiveUser()->getUserDetails();
		$subject = "New CJC reservation from {$userData->user_email}";
		$link = get_permalink($this->event_id);
		
		$message = 	"User Full Name : {$userData->user_name}\n".
					"User Email     : {$userData->user_email}\n".
					"Profile        : {$userData->user_profile}\n".
					"Event Title    : {$event->post_title}\n".
					"Event Link     : {$link}\n".
					"Attendees      : {$this->attendees}\n";

		return wp_mail($to, $subject, $message, $headers);	
	}

	function getEvent(){
		get_post($this->event_id);
	}

	function getUser(){
		
	}

	function isValidEvent(){
		$ev = $this->getEvent();
		return $ev != null && $ev->post_type == "avent" ; // && event rervation is on
	}

	function isValidUser(){
		return FBR_User::ActiveUser()->IsLogged();// && has permission
	}

	function isValidAttendess(){
		return is_numeric($this->attendees) && $this->attendees >0;
	}
}