<?php
	class articleModel extends db
	{	
		public $con;
		
		function __construct()
		{
			$this->con = db::getInstance();
		}

		function add(){
			if(!empty($_POST['article'])){
				$title = $_POST['title'];
				$description = $_POST['description'];
				$content = $_POST['content'];
				$category = $_POST['category'];
				if(!empty($_SESSION['user_id'])){
					$user_id = $_SESSION['user_id'];
				}else{
					$user_id = '';
				}
				$publication_date = date("Y-m-d");
				$num_of_views = 0;
				$total_comments = 0;

				$query = "INSERT INTO article (a_id, title, description, content, cat_id, user_id, num_of_views, publication_date, total_num_of_comments) VALUES ('', :title, :description, :content, :cat_id, :user_id, :num_of_views, :publication_date, :total_num_of_comments)";
				$stm = $this->con->prepare($query);
				$stm->bindValue(':title', $title);
				$stm->bindValue(':description', $description);
				$stm->bindValue(':content', $content);
				$stm->bindValue(':cat_id', $category);
				$stm->bindValue(':user_id', $user_id);
				$stm->bindValue(':num_of_views', $num_of_views);
				$stm->bindValue(':publication_date', $publication_date);
				$stm->bindValue(':total_num_of_comments', $total_comments);

				if($stm->execute()){
					echo "<div class='alert alert-success'>Article created successfully</div>";
				}else{
					echo "<div class='alert alert-danger'>Article not created</div>";
				}
			}
		}

		function getArticle($article_id){
			$stat = $this->con->prepare("SELECT * FROM article WHERE a_id = $article_id");
			$result = '';
			if($stat->execute()){
				$result = $stat->fetch();
			}

			return $result;
		}

		function listAll(){
			$stat = $this->con->prepare("SELECT * FROM article");
			$result = '';
			if($stat->execute()){
				$result = $stat->fetchAll();
			}
			return $result;
		}

		function edit($article_id){
			if(!empty($_POST['article'])){
				$title = $_POST['title'];
				$descr = $_POST['description'];
				$content = $_POST['content'];
				$pub_date = date("Y-m-d");

				$st = $this->con->prepare("UPDATE article SET title=:title, description = :description, content = :content, publication_date=:publication_date WHERE a_id = :articleId");
				$st->bindValue(':title', $title);
				$st->bindValue(':description', $descr);
				$st->bindValue(':content', $content);
				$st->bindValue(':publication_date', $pub_date);
				$st->bindValue(':articleId', $article_id);

				if($st->execute()){
					echo "<div class='alert alert-success'>Article editted successfully</div>";
				}else{
					echo "<div class='alert alert-danger'>Editing unsuccessfully</div>";
				}
			}
			
		}

		function delete($article_id){
			$stat = $this->con->prepare("DELETE FROM article WHERE a_id = :articleId");
			$stat->bindValue(':articleId', $article_id);
			if($stat->execute()){
				echo "<div class='alert alert-success'>Article deleted successfully</div>";
			}else{
				echo "<div class='alert alert-danger'>Article was not deleted</div>";
			}
		}
	}
?>