<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fb_handler
 *
 * @author Exception Software Solution
 */
class FBR_User extends Facebook\Facebook {

	public $helper;
	public $permission;
	private $redirectUrl;
	private $scope;
	private $accessToken;
	private $tableName;
	private $userInfo;

	static $activeUser;

	static function GetDBTable(){
		global $wpdb;
		return $wpdb->prefix . "fbr_users";
	}

	static function CreateDBTable(){
		global $wpdb;
		
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = static::GetDBTable();

		dbDelta( "CREATE TABLE IF NOT EXISTS $table_name (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`phone` varchar(12),
						`user_name` varchar(512) NOT NULL,
						`user_picture` varchar(2048) NOT NULL,
						`user_profile` varchar(1024) NOT NULL,
						`user_email` varchar(45) NOT NULL,
						`user_id` varchar(512) NOT NULL,
						`user_status` bit(1) DEFAULT NULL,
						PRIMARY KEY (`id`)
					) $charset_collate;");
	}

	/**
	 * singleton
	 * @return {FBR_User} current active user
	 */
	public static function ActiveUser(){
		try {
			return isset(static::$activeUser) ? static::$activeUser : new FBR_User();
		} catch (Exception $e) {
			return null; // if the api key is unset
		}
	}

	public function __construct() {

		global $wpdb;
		parent::__construct([
			'app_id' => FBR_FB_APP_KEY,
			'app_secret' => FBR_FB_APP_SECRET,
			'default_graph_version' => 'v2.5',
			'default_access_token' => isset($_SESSION['fb_access_token']) ? $_SESSION['fb_access_token'] : FBR_FB_APP_KEY . "|" . FBR_FB_APP_SECRET
		]);
		$this->helper = $this->getRedirectLoginHelper();
		$this->scope = array('email', 'public_profile');
		$this->redirectUrl = site_url('/login/');

		$this->tableName = "{$wpdb->prefix}fbr_users";
		$this->userInfo = [];
		//self::$instance = $this;
	}

	public function fb() {
		return $this;
	}

	public function getHelper() {
		return $this->helper;
	}

	public function getLoginURl($redirectUrl = null) {
		if (isset($redirectUrl)) {
			$_SESSION['return_to_url'] = $redirectUrl;
		}
		return $this->helper->getLoginUrl($this->redirectUrl, $this->scope);
	}

	public function getUserInfo() {
		try {
			$this->accessToken = $this->helper->getAccessToken();

			$this->prepareTheStage();
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
	}
	
	public function prepareTheStage() {
		if (!isset($this->accessToken)) {
			if ($this->helper->getError()) {
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: " . $helper->getError() . "\n";
				echo "Error Code: " . $helper->getErrorCode() . "\n";
				echo "Error Reason: " . $helper->getErrorReason() . "\n";
				echo "Error Description: " . $helper->getErrorDescription() . "\n";
			} else {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad request';
			}
			exit;
		}

		$this->setDefaultAccessToken($this->accessToken);

		$oAuth2Client = $this->getOAuth2Client();
		$tokenMetadata = $oAuth2Client->debugToken($this->accessToken);

		$tokenMetadata->validateAppId(FBR_FB_APP_KEY);
		$tokenMetadata->validateExpiration();
		
		if (!$this->accessToken->isLongLived()) {
			try {
				$this->accessToken = $oAuth2Client->getLongLivedAccessToken($this->accessToken);
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
				exit;
			}
		}

		$_SESSION['fb_access_token'] = (string) $this->accessToken;

		$this->storeUser();
	}

	private function storeUser() {
		global $wpdb;
		try {
			$response = $this->get('/me?fields=id,name,picture,link,email');
			$userNode = $response->getGraphUser();
			$userData = [
				"user_name" => $userNode["name"],
				"user_picture" => $userNode["picture"]["url"],
				"user_profile" => $userNode["link"],
				"user_email" => $userNode['email'],
				"user_id" => "{$userNode['id']}"
			];
			$this->userInfo = $userData;
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
			throw $e;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			throw $e;
		}
		if (!$this->IsExist($userData["user_id"])) {
			$wpdb->insert(static::GetDBTable(), $userData, ['%s', '%s', '%s', '%s', '%s', '%d']);
		} else {
			//$user = $this->getUserDetails();
			//$userData['user_status'] = $user->user_status;
			$wpdb->update(static::GetDBTable(), $userData, ["user_id" => $userData["user_id"]], ['%s', '%s', '%s', '%s', '%s', '%d'], ['%s']);
		}
	}

	public static function IsExist($userId) {
		global $wpdb;
		$count = $wpdb->get_var("select count(*) from ".static::GetDBTable()." where user_id = '{$userId}'");
		return ((int) $count > 0) ? TRUE : FALSE;
	}

	public function IsLogged() {
		return isset($_SESSION['fb_access_token']);
	}

	public function fbLogout() {
		//$this->helper->logout();
		if (PHP_VERSION_ID >= 50600) {
			session_abort();
		}

		/*
		 * In order to kill the session altogether, like to log the user out, the session id must also be unset. If a cookie is used to propagate the session id
		 * (default behavior), then the session cookie must be deleted. setcookie() may be used for that.
		 */
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(), '', 0, '/');
		session_regenerate_id(true);
	}

	public function getUserName() {
		if ($this->IsLogged()) {

			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);

			$response = $this->get('/me?fields=id,name,picture,link,email');
			$userNode = $response->getGraphUser();
			$userData = [
				"user_name" => $userNode["name"],
				"user_picture" => $userNode["picture"]["url"],
				"user_profile" => $userNode["link"],
				"user_id" => "{$userNode['id']}",
				"user_email" => $userNode['email'],
				"user_status" => NULL,
			];
			//echo $userNode['email'];
			return $userData["user_name"];
		}
		return "";
	}

	public static function getPendingUsers() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM ".static::GetDBTable()." WHERE user_status IS NULL ", OBJECT);
	}

	public static function getApprovedUsers() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM ".static::GetDBTable()." WHERE user_status = 1 ", OBJECT);
	}

	public static function getDeclinedUsers() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM ".static::GetDBTable()." WHERE user_status = 0", OBJECT);
	}

	public static function getAllUsers() {
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM ".static::GetDBTable(), OBJECT);
	}

	public function isApproved() {
		if ($this->IsLogged()) {
			global $wpdb;
			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);

			$response = $this->get('/me?fields=id');
			$userNode = $response->getGraphUser();

			$user = $wpdb->get_results("select * from ".static::GetDBTable()." where user_id = '{$userNode['id']}'");
			if (isset($user) && count($user) > 0) {
				return $user[0]->user_status == 1;
			}
			return FALSE;
		}
	}

	public function getUserDetails() {
		if ($this->IsLogged()) {
			
			global $wpdb;
			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);
			
			$response = $this->get('/me?fields=id');
			$userNode = $response->getGraphUser();

			$user = $wpdb->get_results("select * from ".static::GetDBTable()." where user_id = '{$userNode['id']}'");
			if (isset($user) && count($user) > 0) {
				return $user[0];
			}
			return $user;
		}
		return "";
	}

	public function getUserId() {
			global $wpdb;
			$res = $wpdb->get_results("select id from ".static::GetDBTable()." where user_id = '{$this->userInfo['user_id']}'");
			if (isset($id) && count($id) > 0) {
				return $res[0];
			}
			return $res;
	}

	public function storeUserPhone($Id, $Phone) {
		global $wpdb;
		return $wpdb->update(static::GetDBTable(), ["phone" => $Phone], ["id" => $Id], ['%s'], ['%d']);
	}

	public static function storeMobileUser($userData) {
		global $wpdb;
		if (!static::IsExist($userData["user_id"]) && $wpdb->insert(static::GetDBTable(), $userData, ['%s', '%s', '%s', '%s', '%s']) ) {
				return array("id" => $wpdb->insert_id);
		}
		else {
			return FALSE;
		}
	}
}
