<?php

	class loginController extends controller{
		public $con;
		public $dbase;
		public $arg = array();
		
		function __construct(){
			$this->dbase = new db;
		}

		function index(){
			$con = $this->dbase->getInstance();
			if($con){
				echo "connection successful";
				header('Location: view/template/login.php');
			}else{
				echo "connection failure";
			}
		}

		function login(){
			echo "giving user access...";
		}
	}
?>