<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fb_handler
 *
 * @author Magdy
 */
session_start();

if (!defined('FACEBOOK_SDK_V4_SRC_DIR')) {
	define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/fb-api/');
}

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/fb-api/autoload.php';

class fb_login extends Facebook\Facebook {

	public $helper;
	public $permission;
	private $redirectUrl;
	private $scope;
	private $accessToken;
	private $tableName;
	private $userInfo;

	public function __construct() {

		global $wpdb;
		parent::__construct([
			'app_id' => APP_KEY,
			'app_secret' => APP_SECRET,
			'default_graph_version' => 'v2.5',
			'default_access_token' => isset($_SESSION['fb_access_token']) ? $_SESSION['fb_access_token'] : APP_KEY . "|" . APP_SECRET
		]);
		$this->helper = $this->getRedirectLoginHelper();
		$this->scope = array('email', 'public_profile');
		$this->redirectUrl = site_url('/login/');

		$this->tableName = "{$wpdb->prefix}events_users";
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

	private function prepareTheStage() {
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

		$tokenMetadata->validateAppId(APP_KEY);
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
			$wpdb->insert($this->tableName, $userData, ['%s', '%s', '%s', '%s', '%s', '%d']);
		} else {
			//$user = $this->getUserDetails();
			//$userData['user_status'] = $user->user_status;
			$wpdb->update($this->tableName, $userData, ["user_id" => $userData["user_id"]], ['%s', '%s', '%s', '%s', '%s', '%d'], ['%s']);
		}
	}

	public function IsExist($userId) {
		global $wpdb;
		$count = $wpdb->get_var("select count(*) from {$this->tableName} where user_id = '{$userId}'");
		var_dump((int) $count);
		return ((int) $count > 0) ? TRUE : FALSE;
	}

	public function IsLogged() {
		return isset($_SESSION['fb_access_token']);
	}

	public function fbLogout() {
		//$this->helper->logout();
		$_SESSION['fb_access_token'] = NULL;
		$_SESSION['return_to_url'] = NULL;
		if (PHP_VERSION_ID >= 50600) {
			session_abort();
		}
		session_unset();
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

	public function getPendingUsers() {
		global $wpdb;
		$pending = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}events_users WHERE user_status IS NULL ", OBJECT);
		return $pending;
	}

	public function getApprovedUsers() {
		global $wpdb;
		$approved = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}events_users WHERE user_status IS 1 ", OBJECT);
		return $approved;
	}

	public function getDeclinedUsers() {
		global $wpdb;
		$declined = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}events_users WHERE user_status IS 0 ", OBJECT);
		return $declined;
	}

	public function getAllUsers() {
		global $wpdb;
		$all = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}events_users", OBJECT);
		return $all;
	}

	public function isApproved() {
		if ($this->IsLogged()) {
			global $wpdb;
			$accessToken = $_SESSION['fb_access_token'];

			$this->setDefaultAccessToken($accessToken);

			$response = $this->get('/me?fields=id');
			$userNode = $response->getGraphUser();

			$user = $wpdb->get_results("select * from {$this->tableName} where user_id = '{$userNode['id']}'");
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

			$user = $wpdb->get_results("select * from {$this->tableName} where user_id = '{$userNode['id']}'");
			if (isset($user) && count($user) > 0) {
				return $user[0];
			}
			return $user;
		}
		return "";
	}

}
