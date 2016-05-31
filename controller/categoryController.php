<?php


	class categoryController extends controller{
		public $model;
		public $cat = array();

		function __construct(){
			require_once ROOT.'model/category.php';
			$this->model = new categoryModel;
			$this->cat = $this->model->selectCategory();
		}

		function index(){
			$categories = array();
			$categories = $this->cat;

			$this->model->add();
			require_once ROOT.'view/category.php';
		}

		function add(){
			$categories = array();
			$categories = $this->cat;

			$this->model->add();
			require_once ROOT.'view/add_category.php';
		}

		function edit(){
			$categories = array();
			$categories = $this->cat;
			$this->model->edit();
			require_once ROOT.'view/edit_category.php';
		}

	}
?>