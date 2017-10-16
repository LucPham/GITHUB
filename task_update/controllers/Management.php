<?php 

	/***
	
	 * Class Management as main class
	 * With namespace Manage
	 * Inherits from Load Class->ConnectDb	
	 * This class use to handle action from user
	 * Handle login, logout, add new user
		
	**/


	namespace Manage;
	require("User.php");
	require("Load.php");


	use User\User; // Declare class User with namespace User
	use Load\Load; // Declare class Load with namespace Load
	
	session_start();


	class Management extends Load
	{
		private $user,$id;
		public $info;

		public function __construct()
		{
			parent::__construct();
			if (isset($_SESSION['userid'])) 
			{
				$id = $_SESSION['userid']*1;
				$this->id = $id;
				$this->info = $this->UserModel->user_info($this->id);
			}
		}
/*----------------------------------------------------------------------------------------------*/
		

		// Add new user when login account is admin
		// Else load 404_errors page 
		public function addUser () 
		{
			
			if (isset($_SESSION['userid']) && $this->UserModel->check_admin($this->id) == true) {

				if (isset($_POST['add-btn'])) 
				{
					$errors = array();
					$feild = array('username', 'password', 'email', 'auth');
					$errors = $this->load_form_input_errors($feild);

					if (empty($errors)) 
					{
						$form_input_value = $this->load_form_input($feild);
						if ($this->UserModel->check_email($_POST['email']) == false) 
						{
							$form_input_value['password'] = password_hash($form_input_value['password'], PASSWORD_DEFAULT);
							if ($this->UserModel->insert($form_input_value)) 
							{
								$data['success'] = 'Insert success';
							} else $data['formErr']['err'] = 'Insert db fail';
						} else $data['formErr']['email_err'] = 'This email is exist!';
					} else $data['formErr'] = $errors;
				}
			
				$data['path'] = 'Views/V_add_user.php';
				$this->load('Views/layout/index.php', $data);


			} else {$this->load('Views/layout/404_errors/index.php');}
		}
/*----------------------------------------------------------------------------------------------*/
		

		// User login
		// Add a argument is a User object
		// User object use as a varible 
		public function logInWeb(User $user)
		{

			$feild = array('email', 'password');
			

			if (isset($_POST['log-in-btn'])) {

				$errors = $this->load_form_input_errors($feild);

				if (empty($errors)) {
					$form_input_value = $this->load_form_input($feild);
					if ($this->UserModel->check_email($form_input_value['email']) === true)
					{
						$hash = $this->UserModel->get_pw($form_input_value['email']);
						{

							if (password_verify($form_input_value['password'], $hash['password'])) {
								$_SESSION['userid'] = $hash['id'];
								
								$data['success'] = 'Login success';
								$user->logIn(); 
							} else $data['formErr']['pw_err'] = 'Login fail!';
						}
					}
				} else $data['formErr'] = $errors;
			}
			

			$data['path'] = 'Views/V_index.php';
			$this->load('Views/layout/index.php', $data);
		}

/*----------------------------------------------------------------------------------------------*/

		// Set a argument is a User Object 
		// Call logOut funtion() from User Class
		public function logOut(User $user)
		{
			$user->logOut();
		}
	}
	
?>