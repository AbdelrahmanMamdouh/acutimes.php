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
class FBR_FBhandler extends Facebook\Facebook {

	public $helper;
	public $permission;
	private $redirectUrl;
	private $scope;
	private $accessToken;

	static $init;

	/**
	 * singleton
	 * @return {FBR_User} current active user
	 */
	public static function Init(){
		try {
			return isset(static::$init) ? static::$init : new FBR_FBhandler();
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
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
			throw $e;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			throw $e;
		}


		// get the users by email
		$usrList = FBR_User::selectMulti('user_email',$userNode['email'] );
		
		// if the result has 1 user or more use the first one else make a new one
		$usr = (count($usrList)>=1) ? $usr = $usrList[0] : new FBR_User();

		$usr->user_name = $userNode["name"];
		$usr->user_picture = $userNode["picture"]["url"];
		$usr->user_profile = $userNode["link"];
		$usr->user_email = $userNode['email'];
		$usr->user_id = "{$userNode['id']}";

		// check if both user update & pref update passes
		$passed = (isset($usr->id)) ? $usr->update() : $usr->create();
		return $passed;
	}

	public function IsLogged() {
		return isset($_SESSION['fb_access_token']);
	}

	/**
	 * In order to kill the session altogether, like to log the user out, the session id must also be unset.
	 * If a cookie is used to propagate the session id (default behavior), then the session cookie must be deleted.
	 * setcookie() may be used for that.
	 */
	public function fbLogout() {
		//$this->helper->logout();

		if (PHP_VERSION_ID >= 50600) {
			session_abort();
		}

		@session_destroy();
		@session_unset();
		session_write_close();
		setcookie(session_name(), '', 0, '/');
		session_regenerate_id(true);
	}



	public function getUser() {
		if ($this->IsLogged()) {
			
			global $wpdb;
			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);
			
			$response = $this->get('/me?fields=id');
			$userNode = $response->getGraphUser();

			$usrList = FBR_User::selectMulti('user_id',$userNode['id']);

			if (isset($usrList) && count($usrList) > 0) {
				return $usrList[0];
			}
		}
		return "";
	}


	public function getUserDataFromFBapi() {
		if ($this->IsLogged()) {

			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);

			$response = $this->get('/me?fields=id,name,picture,link,email');
			$userNode = $response->getGraphUser();
			return [
				"user_name" => $userNode["name"],
				"user_picture" => $userNode["picture"]["url"],
				"user_profile" => $userNode["link"],
				"user_id" => "{$userNode['id']}",
				"user_email" => $userNode['email']
			];
		}
		return null;
	}
}