<?php 
	require_once("models/database.php");

	class M_user_management extends database {

		public function getData()
		{
			$this->stateMent= $this->pdo->prepare("SELECT * FROM user");
			$this->stateMent->execute();
			return $this->stateMent->fetchAll(PDO::FETCH_ASSOC);
		}
		public function addUser($data) 
		{
			$sql = "INSERT INTO `user`(`username`, `email`, `password`,`hintpassword`, `admin`) VALUES (?,?,?,?,?)";
			$this->stateMent = $this->pdo->prepare($sql);
			$this->stateMent->execute(array($data['username'], $data['email'], $data['password'], $data['hintpassword'], $data['admin']));
			return $this->pdo->lastInsertId();
		}
		public function checkEmail($email) {
			$this->stateMent = $this->pdo->prepare("SELECT email FROM user WHERE email='".$email."'");
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0) 
				return true;
			return false;
		}
		public function checkAdmin($id) {
			$this->stateMent = $this->pdo->prepare("SELECT id FROM user WHERE id=".$id." and admin = 1");
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
			$sql = "SELECT * FROM user where id=".$id;
			$this->stateMent = $this->pdo->prepare($sql);
			$this->stateMent->execute();
			if ($this->stateMent->rowCount() > 0)
				return $this->stateMent->fetch();
			return false;
		} 
	}
?>