<?php 
	namespace Model\Db;
	require_once("database.php");

	use Model\Db\database;

	class User  extends database{
		public function insert($data=array())
		{	
			$this->stateMent = $this->pdo->prepare("INSERT INTO `user` (`username`,`password`,`email`,`admin`) values (?,?,?,?)");
			$this->stateMent->execute(array($data['username'],$data['password'],$data['email'],$data['auth']));

			return $this->pdo->lastInsertId();
		}
		public function checkEmail($email) {
			$this->stateMent = $this->pdo->prepare("SELECT email FROM user WHERE email='".$email."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return true;
			return false;
		}
		public function getPw($email) {
			$this->stateMent = $this->pdo->prepare("SELECT id,email,password FROM user WHERE email='".$email."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return $this->stateMent->fetch();
			return false;
		}
		public function userInfo($id) {
		
			$this->stateMent = $this->pdo->prepare("SELECT * FROM user WHERE id='".$id."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return $this->stateMent->fetch();
			return false;
		}
		public function checkAdmin($id) {
			$this->stateMent = $this->pdo->prepare("SELECT id FROM user WHERE id=".$id." and admin = 1");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return true;
			return false;
		} 
	}