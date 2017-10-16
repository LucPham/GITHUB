<?php 
	namespace UserModel;
	require_once("database.php");

	use DB\database;

	class User  extends database{
		

		public function insert($data=array())
		{	
			$this->stateMent = $this->pdo->prepare("INSERT INTO `user` (`username`,`password`,`email`,`admin`) values (?,?,?,?)");
			$this->stateMent->execute(array($data['username'],$data['password'],$data['email'],$data['auth']));

			return $this->pdo->lastInsertId();
		}
		public function check_email($email) {
			$this->stateMent = $this->pdo->prepare("SELECT email FROM user WHERE email='".$email."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return true;
			return false;
		}
		public function get_pw($email) {
			$this->stateMent = $this->pdo->prepare("SELECT id,email,password FROM user WHERE email='".$email."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return $this->stateMent->fetch();
			return false;
		}
		public function user_info($id) {
		
			$this->stateMent = $this->pdo->prepare("SELECT * FROM user WHERE id='".$id."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return $this->stateMent->fetch();
			return false;
		}
		public function check_admin($id) {
			$this->stateMent = $this->pdo->prepare("SELECT id FROM user WHERE id=".$id." and admin = 1");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return true;
			return false;
		} 
	}

?>