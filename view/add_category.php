<!DOCTYPE html>
<html>
<head>
  <title>hot-key</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/main.css'>
  <script src='/work/admin/view/js/jquery.js'></script> 
  <script src='/work/admin/view/js/bootstrap.min.js'></script>
</head>
<body>
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
					<a href="/work/admin/article/add">
						<div class="add_article">
							<p>Add article</p>
						</div>
					</a>
					<a href="/work/admin/article/listAll">
						<div class="edit_article">
							<p>Edit article</p>
						</div>
					</a>
					<a href='/work/admin/category'> 
					<div class='category'>
						<img src='' alt='category'>
						<p>Category</p>
					</div>
					</a>
					<a href="/work/admin/category/add">
						<div class="add_category">
							<p>Add category</p>
						</div>
					</a>
					<a href="/work/admin/category/edit">
						<div class="edit_category">
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
				<h1>Добавить категории</h1>
				<?php if(!empty($message)){
						echo $message;
					}
				?>
				<br>
				<div id="add-category">
					<h2>Add category</h2>
					<div class="row">
						<div class="col-md-6">
							<form method='post' action='/work/admin/category/add' enctype="multipart/form-data">
								<div class="form-group">
									<label>name</label>
									<input class='form-control' type='text' name='name' required>
								</div> 
								<div class="form-group">
									<label>color</label>
									<input class='form-control' type='text' name='color'>
								</div> 

								<div class="form-group">
									<label>upload icon</label>
									<input type='file' name='icon' required>
								</div> 

								<div class="form-group">
									<label>parent category</label>
									<select class='form-control' name='parent'>
										<option value=""></option>
										<?php
											foreach ($categories as $key => $v) {
												$id = $v['cat_id'];
												$name = $v['name'];
												echo "<option value='$id'>$name</option>";
											}
										?>
									</select> 
								</div>
								<div class="form-group">
									<input class='form-control btn btn-warning' type='submit' value="submit">
								</div> 
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	setTimeout(function() {
		    $('.alert').fadeOut('fast');
		}, 2000); // <-- time in milliseconds


	// SIDE MENIU
	$('.article').hover(function(){
		$('.add_article, .edit_article').css('display', 'block');
		$('.add_article, .edit_article').animate({
			height: '30px'
		});
	});

	$('.category').hover(function(){
		$('.add_category, .edit_category').css('display', 'block');
		$('.add_category, .edit_category').animate({
			height: '30px'
		});
	});



	$('.side-menu div').hover(function(){
		$(this).addClass('highlight');
	}, function(){
		$(this).removeClass('highlight');
	});


</script>

</body>

</html>