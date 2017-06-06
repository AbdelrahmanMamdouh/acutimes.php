<?php
class FBR_User {

	public $id;
	public $phone;
	public $address;
	public $age;
	public $user_name;
	public $user_picture;
	public $user_profile;
	public $user_email;
	public $user_id;
	public $user_status;

	static function GetDBTable(){
		global $wpdb;
		return $wpdb->prefix . "fbr_users";
	}

	public static $DataFormat = 
	array(

		'id'			=>'%d',
		'phone'			=>'%s',
		'address'		=>'%s',
		'age'			=>'%s',
		'user_name'		=>'%s',
		'user_picture'	=>'%s',
		'user_profile'	=>'%s',
		'user_email'	=>'%s',
		'user_id'		=>'%s',
		'user_status'	=>'%d',

	);

	public static $PK = ['id'];

	const STATE_PENDING = null;
	const STATE_REJECTED = 0;
	const STATE_APPROVED = 1;
	
	static function CreateDBTable(){
		global $wpdb;
		
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = static::GetDBTable();

		dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`phone` varchar(12),
						`address` varchar(255),
						`age` varchar(40),
						`user_name` varchar(512),
						`user_picture` varchar(2048),
						`user_profile` varchar(1024),
						`user_email` varchar(45),
						`user_id` varchar(512),
						`user_status` bit(1) DEFAULT NULL,
						PRIMARY KEY (`id`)
					) $charset_collate;");
	}

	public static function GetFeilds($user_data){
		$ret = [];
		foreach ($user_data as $key => $value) {
			if(isset(static::$DataFormat[$key])){
				array_push($ret,static::$DataFormat[$key]);
			}
		}
		return $ret;
	}

	/**
	* Fill user data from an Array
	*/
	public function setData(array $vars) {
		$has = get_object_vars($this);
		foreach ($has as $name => $oldValue) {
			array_key_exists($name, $vars) ?  $this->$name = $vars[$name] : NULL;
		}
	}

	private function parseData($data){
		$this->id			= $data->id;
		$this->phone		= $data->phone;
		$this->address		= $data->address;
		$this->age			= $data->age;
		$this->user_name	= $data->user_name;
		$this->user_picture	= $data->user_picture;
		$this->user_profile	= $data->user_profile;
		$this->user_email	= $data->user_email;
		$this->user_id		= $data->user_id;
		$this->user_status	= $data->user_status;
	}

	private function toData(){
		return array(

			'id'			=> (int) $this->id,
			'phone'			=> $this->phone,
			'address'		=> $this->address,
			'age'			=> $this->age,
			'user_name'		=> $this->user_name,
			'user_picture'	=> $this->user_picture,
			'user_profile'	=> $this->user_profile,
			'user_email'	=> $this->user_email,
			'user_id'		=> $this->user_id,
			'user_status'	=> $this->user_status,

		);
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

		$data = $this->toData();
		unset($data['id']);
		$feilds = static::GetFeilds($data);

		$passed = $wpdb->insert(static::GetDBTable(), $data, $feilds);
		if($passed){
			$this->id = $wpdb->insert_id;
		}
		return $passed;
	}

	function update(){
		global $wpdb;

		$data = $this->toData();
		unset($data['id']);
		$feilds = static::GetFeilds($data);

		return $wpdb->update( 
			static::GetDBTable(),
			$data,
			array( 'id' =>$this->id ),
			$feilds,
			static::$DataFormat['id']
		);
	}

	function save(){
		return (isset($this->id)) ? $this->update() : $this->create();
	}

	function select(){
		global $wpdb;

		$this->parseData($wpdb->get_row($wpdb->prepare(
			"SELECT * FROM ".static::GetDBTable()." WHERE id = %d", $this->id), object));

	}

	public static function selectMulti($att = null, $key = null){
		global $wpdb;

		if ($key === null || $key ==='null'){
			$query = "SELECT * FROM ".static::GetDBTable()." WHERE {$att} IS NULL";
		} else {
			$query = $wpdb->prepare("SELECT * FROM ".static::GetDBTable()." WHERE {$att} = ".static::$DataFormat[$att], $key);
		}

		return static::parseMultiData( $wpdb->get_results($query, object));
	}

	public function isApproved(){
		return $this->user_status == self::STATE_APPROVED;
	}

}