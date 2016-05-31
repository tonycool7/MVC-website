<?php
	class indexController extends controller{
		function __construct(){
			// echo "index controller!<br>";
		}


		function index(){
			require_once ROOT.'view/index.php';
		}
	}

?>