<?php
	
	define ('DIRSEP', DIRECTORY_SEPARATOR);
	$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;
	ini_set("display_errors", "On");
	ini_set("display_startup_errors", "On");
	error_reporting(E_ALL);
	define("ROOT", $site_path);
	define('hostname', 'localhost');
	define('username', 'root');
	define('password', 'dlords');
	define('database','test');
?>