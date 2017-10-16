<?php 
	/***
	
	 * Class UserAction is interface class
	 * With User namespace
	
	 * This class use to declare method function of users action

		
	**/
	namespace User;
	interface UserAction
	{
		public function logIn($input = array());
		public function logOut();
	}

?>