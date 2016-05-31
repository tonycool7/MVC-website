<?php 
	class controller{
		function __construct(){}

		function clean($data){
			$data = trim($data);
			$data = strip_tags($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			
			return $data;
		}
	}

?>