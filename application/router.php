<?php

	class router{
		private $uri;
		public $file;
		private $controller;
		private $action;
		private $arg = array();

		function __construct(){}

		function setUri(){
			if(!empty($_SERVER['REQUEST_URI'])){
				$this->uri = $_SERVER['REQUEST_URI'];
			}else{
				die("Error, uri error");
			}
		}

		function setController(){
			$parts = explode('/', $this->uri);
			if(empty($parts[3])){
				$this->controller = 'index';
			}else{
				$this->controller = $parts[3];
			}

			if(!empty($parts[4])){
				$this->action = $parts[4];
			}else{
				$this->action = 'index';
			}

			if(!empty($parts[5])){
				array_push($this->arg, $parts[5]);
			}
			$this->file = 'controller/'.$this->controller.'Controller.php';
		}

		function reroute(){
			$this->setUri();
			$this->setController();
			// echo $this->controller;
			// echo $this->action;
			if(!file_exists($this->file)){
				$this->controller = 'error404';
				$this->file = 'controller/'.$this->controller.'Controller.php';
			}

			require_once $this->file;
			$class = $this->controller.'Controller';
			$controller = new $class;

			if(is_callable($controller, $this->action)){
				$this->action = 'index';
			}
			// echo $this->action;

			call_user_func_array(array($controller, $this->action), $this->arg);
		}
	}
?>