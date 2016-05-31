<?php
	require_once '/var/www/html/work/admin/model/user.php';

	class registerController extends controller
	{
		public $con;
		public $dbase;
		public $arg = array();
		
		function __construct(){
			$this->con = new user;
		}

		function index(){
			header('Location: view/template/register.php');
		}

		function  validateEmail($mail){
			return filter_var($mail, FILTER_VALIDATE_EMAIL);
		}

		function clean($data){
			$data = trim($data);
			$data = strip_tags($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			
			return $data;
		}

		function hash($password){
			return password_hash($password, PASSWORD_BCRYPT);
		}


		function verify_user($password, $hash){
			return password_verify($password, $hash);
		}

		function addUser(){
			$userDetails = array();
			$userDetails['fname'] = $this->clean($_POST['firstname']);
			$userDetails['lname'] = $this->clean($_POST['surname']);
			$userDetails['patronymic'] = $this->clean($_POST['middlename']);
			$userDetails['username'] = $this->clean($_POST['userlogin']);
			$userDetails['mail'] = $this->clean($_POST['email']);
			$userDetails['pass'] = $this->clean($_POST['userpass']);
			$userDetails['telephone'] = $_POST['tel'];

			if($this->con->insert($userDetails)){
				header('Location: /work/view/template/login.php?reg=success');
			}
		}
	}

?>