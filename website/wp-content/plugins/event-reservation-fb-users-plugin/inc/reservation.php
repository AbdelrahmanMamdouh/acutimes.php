<?php
class RFB_Reservation {

	public $reserv_date;
	public $id;
	public $user_id;
	public $event_id;
	public $state = 0;

	const STATE_PENDING = 0;
	const STATE_APPROVED = 1;
	const STATE_REJECTED = 2;

	static function GetDBTable(){
		global $wpdb;
		return $wpdb->prefix . "rfb_reservations";
	}


	static function CreateDBTable(){
		global $wpdb;
		
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = RFB_Reservation::GetDBTable();

		dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
					`user_id` INT NOT NULL,
					`event_id` INT NOT NULL,
					`state` INT NOT NULL,
					`reserv_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
					PRIMARY KEY (`user_id`,`event_id`)
					) $charset_collate;");
	}

	private function toData(){
		return array(
				'reserv_date'=> $this->Ev,
				'user_id'=> $this->user_id,
				'state'=> $this->state,
			);
	}
	private function toDataFormat(){
		return ['%d', '%d', '%d'];
	}

	function create(){
		global $wpdb;

		$wpdb->insert(
			static::GetDBTable(), 
			$this->toData(),
			$this->toDataFormat());
	}

	function update(){
		$wpdb->update( 
			static::GetDBTable(), 
			array('state' => $this->state),
			array( 
				'user_id' => $this->user_id,
				'event_id' => $this->event_id 
				), 
			['%d'],
			['%d', '%d'] 
		);
	}


	function sendMail(){

	}

	static function reserve($user, $event){
		$reserv = new RFB_Reservation();
		//$reserv->event_id = $event->;
		//$reserv->user_id = $user->;
		$reserv->create();
		$reserv->sendMail();
	}
}