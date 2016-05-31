<?php
	
	class template{
		function __construct(){}

		function getHeader(){
			return "<!DOCTYPE html>
<html>
<head>
  <title>hot-key</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/main.css'>
  <script type='text/javascript' src='/work/admin/view/js/jquery.js'></script> 
  <script type='text/javascript' src='/work/admin/view/js/bootstrap.min.js'></script>
</head>";
	}

	function getSideMenu(){
		return "<body>
	<div class='contianer-fluid'>
		<div class='row top'>
			<div class='col-md-12'>
				<p>Админ панел Город Горячий Ключ</p>
			</div>
		</div>
	</div>

	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2 side-menu'>
					<a href='/work/admin/index'> <div class='admin'>
						<img src='' alt='admin'>
						<p>Admin</p>
					</div>
					</a>
					<a href='/work/admin/article'> 
					<div class='article'>
						<img src='' alt='article'>
						<p>Article</p>
					</div>
					</a>
					<a href='/work/admin/article/add'>
						<div class='add_article'>
							<p>Add article</p>
						</div>
					</a>
					<a href='/work/admin/article/listAll'>
						<div class='edit_article'>
							<p>Edit article</p>
						</div>
					</a>
					<a href='/work/admin/category'> 
					<div class='category'>
						<img src='' alt='category'>
						<p>Category</p>
					</div>
					</a>
					<a href='/work/admin/category/add'>
						<div class='add_category'>
							<p>Add category</p>
						</div>
					</a>
					<a href='/work/admin/category/edit'>
						<div class='edit_category'>
							<p>Edit category</p>
						</div>
					</a>
					<a href='/work/admin/comments'> 
					<div class='comments'>
						<img src='' alt='comments'>
						<p>Comments</p>
					</div>
					</a>
					<a href='/work/admin/appearance'> 
					<div class='appearance'>
						<img src='' alt='appearance'>
						<p>Appearance</p>
					</div>
					</a>
					<a href='/work/admin/advert'> 
					<div class='advert'>
						<img src='' alt='advert'>
						<p>Advertisement</p>
					</div>
					</a>
			</div>
			<div class='col-md-10'>
				<br>
			";
	}

	function getCategory(){
		return "";
	}

	function getFooter(){
		return "	<div class='container-fluid'>
		<div class='row footer'>
			<div class='col-md-12'>
				<p>Footer</p>
			</div>
		</div>
	</div>
	</body>";
	}
	
	function loginBody(){
		echo "<div class='container'>
	<div class='col-md-3'></div>
	<div class='col-md-6'>
	<h2> Login</h2>
	<form class='form-horizontal' role='form' method='post' action='/work/admin/login/login'>
		<div class='form-group'>
			<label for='login' class='control-label col-sm-2'> Логин: </label>
			 <div class='col-sm-10'>
			<input type='text' id='login' name='userlogin' class='form-control' required/>
			</div>
		</div>

		<div class='form-group'>
			<label for='password' class='control-label col-sm-2'> Пароль: </label>
			 <div class='col-sm-10'>
			<input type='password' id='password' name='userpass' class='form-control' required/>
			</div>
		</div>

		<div class='form-group'>
			<label for='captcha' class='control-label col-sm-2'> Captcha: </label>
			 <div class='col-sm-10'>
			<input type='text' id='repassword' name='captcha' class='form-control'/>
			</div>
		</div>

		<div>
			<input type='submit' value='Login' class='btn btn-info form-control'/>
		</div>
		</form>
		</div>
		<div class='col-md-3'></div>
		</div>";

	}
}

?>