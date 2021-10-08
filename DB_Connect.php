<?php

require_once ('MysqliDb.php');
require_once ('default_variables.php');

class DB_Connect
{

	private $c,$database_name;
	private $app_track_version, $app_device_type, $app_store_version, $app_device_model, $app_os_version, $app_secret, $auth_token;
	public $flag;
	private $val_app_secret, $allow_token_for_multiple_device;
	
	public function __construct()
	{
		$this->app_track_version = "";
		$this->app_device_type = "";
		$this->app_store_version = "";
		$this->app_store_build_number = "";
		$this->app_device_model = "";
		$this->app_os_version = "";
		$this->app_secret = "";
		$this->auth_token = "";
		$this->access_token = "";
		$this->objDefaultVariable = new Cls_DefaultVariables();
		$this->val_app_secret = $this->objDefaultVariable->VAR_APP_SECERET;
		
		$this->allow_token_for_multiple_device = true;
		
		if (function_exists('getallheaders')) 
		{ 
		
		foreach (getallheaders() as $name => $value) 
		{
			if (strtolower($name) == strtolower("App-Track-Version"))
			{
				$this->app_track_version = $value;
			}
			else if (strtolower($name) == strtolower("App-Device-Type"))
			{
				$this->app_device_type = $value;
			}
			else if (strtolower($name) == strtolower("App-Store-Version"))
			{
				$this->app_store_version = $value;
			}
			else if (strtolower($name) == strtolower("App-Device-Model"))
			{
				$this->app_device_model = $value;
			}
			else if (strtolower($name) == strtolower("App-Os-Version"))
			{
				$this->app_os_version = $value;
			}
			else if (strtolower($name) == strtolower("App-Secret"))
			{
				$this->app_secret = $value;
			}
			else if (strtolower($name) == strtolower("Auth-Token"))
			{
				$this->auth_token = $value;
			}
			else if (strtolower($name) == strtolower("Access-Token"))
			 {
			 	$this->access_token = $value;
			 }
			else if (strtolower($name) == strtolower("App-Store-Build-Number"))
			{
				$this->app_store_build_number = $value;
			}
			
		}
		}
	}

	function __destruct() {
		$this->close();
	}
	// Connecting to database
	
	public function connect()
	{
		/*
		$this->VAR_DATABASE_NAME = "founde48_ark_mobile";
		$this->VAR_DATABASE_USER = "founde48_arkm";
		$this->VAR_DATABASE_PASSWORD = "Password@123";
		*/
	
		if(!defined("DB_HOST"))
		{
			define("DB_HOST","localhost");
		}
		
		if(!defined("DB_USER"))
		{
			
				// define("DB_USER",$this->objDefaultVariable->VAR_DATABASE_USER);
				define("DB_USER", "u348021208_purple");
		}
		
		if(!defined("DB_PASSWORD"))
		{
			// define("DB_PASSWORD",$this->objDefaultVariable->VAR_DATABASE_PASSWORD);
			define("DB_PASSWORD", "Mayank@7103");

		}
		
		if(!defined("DB_DATABASE"))
		{
			// define("DB_DATABASE",$this->objDefaultVariable->VAR_DATABASE_NAME);
			define("DB_DATABASE", "u348021208_purple");

		}
		
		$con = new MysqliDb (Array (
                'host' => DB_HOST,
                'username' => DB_USER, 
                'password' => DB_PASSWORD,
                'db'=> DB_DATABASE,
                'charset' => 'utf8mb4'));
		
		/*$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
		//mysqli_set_charset($con,'utf8');
		$con->set_charset("utf8mb4");*/
		
		$this->c = $con;
		return $con;
	}

	public function getAllHeader()
	{
		$arr = array();
		$arr["app_track_version"] = $this->app_track_version;
		$arr["app_device_type"] = $this->app_device_type;
		$arr["app_store_version"] = $this->app_store_version;
		$arr["app_device_model"] = $this->app_device_model;
		$arr["app_os_version"] = $this->app_os_version;
		$arr["app_secret"] = $this->app_secret;
		$arr["auth_token"] = $this->auth_token;
		$arr["access_token"] = $this->access_token;
		$arr["app_store_build_number"] = $this->app_store_build_number;
		
		return $arr;
	}

	public function validateHeaders($service,$arrExceptField)
	{
	
		$arr = array();
		
		$isValidate = false;
		
		if ($this->app_track_version == "")
		{
			$arr["msg"] = "Invalid request1";
			$isValidate = true;
		}
		else if ($this->app_device_type == "")
		{
			$arr["msg"] = "Invalid request2";
			$isValidate = true;
		}
		else if ($this->app_store_version == "")
		{
			$arr["msg"] = "Invalid request3";
			$isValidate = true;
		}
		else if ($this->app_device_model == "")
		{
			$arr["msg"] = "Invalid request4";
			$isValidate = true;
		}
		else if ($this->app_os_version == "")
		{
			$arr["msg"] = "Invalid request5";
			$isValidate = true;
		}
		else if ($this->app_secret != $this->val_app_secret)
		{
			$arr["msg"] = "Invalid request6";
			$isValidate = true;
		}
		else if ($this->auth_token == "")
		{
			if (!in_array($service, $arrExceptField)) 
			{
				$arr["msg"] = "Invalid request7";
				$isValidate = true;
			}
		}
		
		else if ($this->access_token == "")
		{
		    if (!in_array($service, $arrExceptField))
		    {
		        $arr["msg"] = "Invalid request8";
		        $isValidate = true;
		    }
		}
		
		if ($isValidate == true)
		{
			$arr["status"] = 0;
		}
		else
		{
			$arr["status"] = 1;
		}
		
		return $arr;
	}
	
	public function getAuthTokenFromHeader()
	{
		return $this->auth_token; 
	}
	
	public function getAccessTokenFromHeader()
	{
	    return $this->access_token;
	}
	
	public function getStatusForUpdateToken()
	{
		return $this->allow_token_for_multiple_device;
	}
	
	public function getAppTrackVersion()
	{	
		return $this->app_track_version; 
	}
	
	public function getDeviceType()
	{
		return $this->app_device_type; 
	}
	
	public function getDatabaseName()
	{
		return $this->database_name;
	}

	// Closing database connection
	public function close() 
	{
		if ($this->c)
		{
			$this->c->disconnect();
			//mysqli_close($this->c);
		}
	}
}
?>