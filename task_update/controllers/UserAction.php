<?php 
	/***
	
	 * Class UserAction is interface class
	 * With namespace Controller\Users
	
	 * This class use to declare method function of users action

		
	**/
	namespace Controller\Users;
	
	interface UserAction
	{
		public function logIn($input = array());
		public function logOut();
	}

