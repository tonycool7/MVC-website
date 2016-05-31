<?php
	class error404Controller extends controller{
		function __construct(){
			echo "Error 404!<br>";
		}

		function index(){
			echo "This page was not found!";
		}
	}

?>