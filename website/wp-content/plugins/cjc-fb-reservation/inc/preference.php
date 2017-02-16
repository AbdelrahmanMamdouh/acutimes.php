<?php
class FBR_Preference {

	public $pref_id;
	public $user_id;

	public static $DataFormat = 
	array(
		'user_id'		=> '%d',
		'pref_id'		=> '%d',
	);

	public static $PK = ['user_id', 'pref_id'];


	static function GetDBTable(){
		global $wpdb;
		return $wpdb->prefix . "fbr_preferences";
	}


	static function CreateDBTable(){
		global $wpdb;
		
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = static::GetDBTable();

		dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
						`user_id` INT NOT NULL,
						`pref_id` INT NOT NULL,
						PRIMARY KEY (`user_id`,`pref_id`)
					) $charset_collate;");
	}

	private function parseData($data){
		$this->user_id = (int) $data['user_id'];
		$this->pref_id = (int) $data['pref_id'];
	}

	static private function parseMultiData($data){
		$result = [];
		foreach($data as $da){
			$temp = new static();
			$temp->parseData($da);
			$genre = get_term_by('id' , $temp->pref_id, 'genre' );
			$genre ? array_push($result, $genre) : null;
		}
		return $result;
	}

	function create(){
		global $wpdb;

		return $wpdb->insert(
			static::GetDBTable(), 
			array(
				'pref_id'	=> $this->pref_id,
				'user_id'	=> $this->user_id,
			),
			['%d', '%d']);
	}

	public static function createMulti($user_id, $pref_ids){
		global $wpdb;
		wpdb::delete( static::GetDBTable(), array( 'user_id' => $user_id ), array( '%d' ) );
		foreach($pref_id as $p_id){
			$temp = new static();
			$temp->user_id = $user_id;
			$temp->pref_id = $p_id;
			$temp->create();
		}

	}

	public static function selectMulti($att = null, $key = null){
		global $wpdb;

		return static::parseMultiData( $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable." WHERE {$att} = ".static::$DataFormat[$att],
			$key), object));
	}

}