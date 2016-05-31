<!DOCTYPE html>
<html>
<head>
  <title>hot-key</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='/work/admin/view/css/main.css'>
  <script src='/work/admin/view/js/tinymce/tinymce.min.js'></script>
  <script src='/work/admin/view/js/bootstrap.min.js'></script>
  <script src='/work/admin/view/js/jquery.js'></script> 
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


			<div class="col-md-10">
				<h1>Редактировать статьи</h1>
				<br>
				<div class="row">
					<div class="col-md-12  create_article">
					<script>tinymce.init({ selector:'textarea' });</script>
					<?php $Aid = $article_details['a_id'];
					echo "<form action='/work/admin/article/edit/$Aid' method='post'>" ?>
						<div class="form-group">
							<label>Title</label>
							<input class='form-control' id='title' type='text' name='title' value='<?php if(!empty($article_details)){echo $article_details['title'];}?>' required>
						</div> 
						<div class="form-group">
							<label>Description</label>
							<input class='form-control' id='descr' type='text' name='description' value='<?php if(!empty($article_details)){echo $article_details['description'];}?>' required>
						</div>
						<div class="form-group">
							<label>Category</label>
							<Select name='category'>
								<?php
									foreach ($category as $key => $value) {
										$name = $value['name'];
										$id = $value['cat_id'];
										echo "<option value=$id>$name</option>";
									}
								?>
							</Select>
						</div> 
						<textarea name='content'><?php if(!empty($article_details)){echo $article_details['content'];}?></textarea required><br>
						<input type="submit" class="btn btn-primary" name='article' value="Сохранить">
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		setTimeout(function() {
		    $('.alert').fadeOut('fast');
		}, 2000); // <-- time in milliseco
		
		// CREATE ARTICLE SECTION
		$('.add').click(function(){
			$('#title, #descr, textarea').val('');
			$('.create_article').toggle();
			$('.edit_article').css('display', 'none');
		});

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