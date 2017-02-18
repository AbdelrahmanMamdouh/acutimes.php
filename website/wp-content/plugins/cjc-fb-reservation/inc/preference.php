<?php
class FBR_Preference {

	public $pref_ids;
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
		$this->user_id = (int) $data[1]->user_id;
		$this->pref_ids = array();
		//$this->pref_id = (int) $data['pref_id'];

		foreach($data as $da){
			array_push($this->pref_ids, $da->pref_id);
		}
	}

	public function select($att = null, $key = null){
		global $wpdb;

		$this->parseData( $wpdb->get_results($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable()." WHERE {$att} = ".static::$DataFormat[$att],
			$key), object));
	}

	public function getSelectedAsBoolean(){
		$result = array();
		foreach($this->pref_ids as $pref_id){
			$result[$pref_id] = true;
		}
		return $result;
	}

	public function getSelectedGenre(){
		$result = [];
		foreach($this->pref_ids as $pref_id){
			$genre = static::getGenreByID( $pref_id );
			$genre ? array_push($result, $genre) : null;
		}
		return $result;
	}

	public static function getAllGenres(){
		return get_terms( 'genre' );
	}

	public static function getGenreByID($id){
		return get_term_by('id' , $id, 'genre' );
	}

	private function _create_single($pref_id){
		global $wpdb;

		return $wpdb->insert(
			static::GetDBTable(), 
			array(
				'pref_id'	=> $pref_id,
				'user_id'	=> $this->user_id,
			),
			['%d', '%d']);
	}

	public function create(){
		global $wpdb;
		$wpdb->delete( static::GetDBTable(), array( 'user_id' => $this->user_id ), array( '%d' ) );

		foreach($this->pref_ids as $p_id){
			$this->_create_single($p_id);
		}
		return true;
	}

}