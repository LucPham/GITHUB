<?php 
	/***
	
	 * Class ConnectDb
	 * With namespace Controller\Db	
	 * This class include to class User
	 * Set a varible $UserModel to declare class User in models directory in @Constructor function;
		
	**/
	namespace Controller\Db;

	require_once("models/User.php");

	use Model\Db\User;
	
	class ConnectDb 	
	{
		public $UserModel;
		public function __construct()
		{
			$this->UserModel = new User;
		}
	}

