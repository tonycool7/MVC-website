<?php
	require_once 'config/config.php';
	require_once ROOT.'/config/init.php';
	// $_SESSION['dir'] = ROOT;	
	$router = new router;
	$router->reroute();
	
?>