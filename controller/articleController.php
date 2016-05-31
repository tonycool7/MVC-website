<?php

	class articleController extends controller
	{
		public $article;
		public $categories;
		public $allArticles;
		public $categoryOptions;
		
		function __construct()
		{
			require_once ROOT.'model/category.php';
			require_once ROOT.'model/article.php';

			$this->article = new articleModel;
			$this->categories = new categoryModel;
			$this->allArticles = $this->article->listAll();
			$this->categoryOptions = $this->categories->selectSubCategory();
		}

		function index(){
			$this->view();
		}


		function add(){
			$this->article->add();
			$category = $this->categoryOptions;
			require_once ROOT.'view/add_article.php';
		}


		function editing($article_id){
			$category = $this->categoryOptions;
			$article_details = $this->article->getArticle($article_id[0]);
			require_once ROOT.'view/edit_article.php';
		}

		function edit($article_id){
			$category = $this->categoryOptions;
			$this->article->edit($article_id);
			require_once ROOT.'view/edit_article.php';
		}

		function listAll(){
			$category = $this->categoryOptions;
			$view = $this->allArticles;
			require_once ROOT.'view/list_article.php';
		}

		function delete($article_id){
			$category = $this->categoryOptions;
			$this->article->delete($article_id);
			$view = $this->allArticles;
			require_once ROOT.'view/list_article.php';
		}

		function view(){
			$category = $this->categoryOptions;
			$view = $this->allArticles;
			require_once ROOT.'view/article.php';
		}

	}
?>