<?php

	class db{
		private static $db_instance = NULL;

		function __contruct(){
		}

		function getInstance(){
			return (!self::$db_instance) ? new PDO("mysql:host=".hostname.";dbname=".database."", username, password) : self::$db_instance;
		}
	}

?>