<?php 
	/***
	
	 * Class ConnectDb
	 * With namespace ConnectDb	
	 * This class include to class User
	 * Set a varible $UserModel to declare class User in models directory in @Constructor function;
		
	**/

	namespace ConnectDb;
	require_once("models/User.php");

	use UserModel\User;
	
	class ConnectDb 	
	{
		public $UserModel;
		public function __construct()
		{
			$this->UserModel = new User;
		}
	}

?>