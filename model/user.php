<?php
	require_once '/var/www/html/work/admin/model/db.php';
	class user extends db{
		public $con;
		function __construct(){
			$d = new db;
			$this->con = $d->getInstance();
		}

		function insert($user){
			$stmt = $this->con->prepare("INSERT INTO users (user_id, firstname, lastname, patronymic, username, email, password, telephone) VALUES ('', :firstname, :lastname, :patronymic, :username, :email, :password, :telephone)");
			$stmt->bindParam(':firstname', $user['fname']);
			$stmt->bindParam(':lastname', $user['lname']);
			$stmt->bindParam(':patronymic', $user['patronymic']);
			$stmt->bindParam(':username', $user['username']);
			$stmt->bindParam(':email', $user['mail']);
			$stmt->bindParam(':password', $user['pass']);
			$stmt->bindParam(':telephone', $user['telephone']);

			if($stmt->execute()){
				return true;
			}
			return false;
			
		}

	}

?>