<?php
	class categoryModel extends db{
		public $con;

		function __construct(){
			$this->con = db::getInstance();
		}

		function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 		}

		function add(){
			$message = '';
			if(!empty($_POST) && !empty($_FILES)){
				$filename = basename($_FILES['icon']['name']);
				$name = $_POST['name'];
				$color = $_POST['color'];
				$location = '/var/www/html/work/hotkey/images/'.$filename;
				$parent = $_POST['parent'];
				$uploadedfile = $_FILES['icon']['tmp_name'];

				if($this->con){
					$stmt = $this->con->prepare("INSERT INTO category (cat_id, name, color, icon, parent_id) VALUES ( '',:name, :color, :icon, :parent_id)");
					$stmt2 = $this->con->prepare("INSERT INTO topNavigator(nav_id, name, cat_id) VALUES ('', :name, :cat_id)");
					$stmt->bindParam(':name', $name);
					$stmt->bindParam(':color', $color);
					$stmt->bindParam(':icon', $filename);
					$stmt->bindParam(':parent_id', $parent);
					if($stmt->execute()){
						$lastId = $this->con->lastInsertId();
						$stmt2->bindParam(':name', $name);
						$stmt2->bindParam(':cat_id', $lastId);
						if($stmt2->execute()){
							$message = "<div class='alert alert-success'>Category inserted successfully to database!</div>";
							if (move_uploaded_file($_FILES['icon']['tmp_name'], $location)){
								// $extension = $this->getExtension($filename);
								// $extension = strtolower($extension);
								

								// list($width,$height)=getimagesize($location);

								// $newheight= 50;
								// $newwidth = 50;
								// $tmp=imagecreatetruecolor($newwidth, $newheight);
								// if($extension=="jpg" || $extension=="jpeg" )
								// {
								// 	$src = imagecreatefromjpeg($location);
								// }
								// else if($extension=="png")
								// {
								// 	$src = imagecreatefrompng($location);
								// }
								// else 
								// {
								// 	$src = imagecreatefromgif($location);
								// }

								 
								//  imagealphablending($tmp, false);
								//  imagesavealpha($tmp,true);
								//  $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
								//  imagefilledrectangle($tmp, 0, 0, $newwidth, $newheight, $transparent);

								// imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);
								// imagejpeg($tmp,$location,100);
								// imagedestroy($src);
								// imagedestroy($tmp);
							 	echo"<div class='alert alert-success'>File uploaded successfully!</div>";
							 }else{
							 	echo "<div class='alert alert-danger'>file not uploaded</div>";
							 }
						}else{
							echo "<div class='alert alert-danger'>file not uploaded</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>file not uploaded</div>";
					}
				}else{
					die("could not connect to database server!");
				}
			}
		}

		function selectCategory(){
			if($this->con){
				$stmt = $this->con->prepare("SELECT * FROM category");
				if($stmt->execute()){
					$result = $stmt->fetchAll();
					return $result;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}


		function selectSubCategory(){
			if($this->con){
				$stmt = $this->con->prepare("SELECT * FROM category WHERE parent_id <> 0");
				if($stmt->execute()){
					$result = $stmt->fetchAll();
					return $result;
				}else{
					return false;
				}
			}else{
				return false;
			}	
		}


		function edit(){
			if(!empty($_POST['edit_submit'])){
				$e_id = $_POST['edit_id'];
				$e_name = $_POST['edit_name'];
				$e_color = $_POST['edit_color'];
				$e_p_id = $_POST['edit_parent_id'];
				$e_image_name =  basename($_FILES['edit_image']['name']);
				$image_path = '/var/www/html/work/hotkey/images/'.$e_image_name;
	
				if($this->con){
					if(!empty($e_name)){
						$query = "UPDATE category SET name = :name WHERE cat_id=:id";
						$st = $this->con->prepare($query);
						$st->bindValue(':name', $e_name);
						$st->bindValue(':id', $e_id);
						if($st->execute()){
							echo"<div class='alert alert-success'>name changed successfully!</div>";
						}else{
							echo"<div class='alert alert-danger'>exection unsuccessful</div>";
						}
					}

					if(!empty($e_color)){
						$query = "UPDATE category SET color=:color WHERE cat_id=:id";
						$st = $this->con->prepare($query);
						$st->bindValue(':color', $e_color);
						$st->bindValue(':id', $e_id);
						if($st->execute()){
							echo "<div class='alert alert-success'>color changed successfully!</div>";
						}else{
							echo "<div class='alert alert-danger'>exection unsuccessful</div>";
						}
					}

					if(!empty($e_image_name)){
						$query = "UPDATE category SET icon=:icon WHERE cat_id=:id";
						$st = $this->con->prepare($query);
						$st->bindValue(':icon', $e_image_name);
						$st->bindValue(':id', $e_id);
						if($st->execute()){
							$edit_message_success += "<div class='alert alert-success'>image changed successfully!</div>";
							if(move_uploaded_file($_FILES['edit_image'], $image_path)){
								echo "<div class='alert alert-success'>image uploaded successfully!</div>";
							}
						}else{
							echo "<div class='alert alert-danger'>exection unsuccessful</div>";
						}
					}


					if(!empty($e_p_id)){
						$query = "UPDATE category SET parent_id = :parent_id WHERE cat_id = :id";
						$st = $this->con->prepare($query);
						$st->bindValue(':parent_id', $e_p_id);
						$st->bindValue(':id', $e_id);
						if($st->execute()){
							echo "<div class='alert alert-success'>color changed successfully!</div>";
						}else{
							echo "<div class='alert alert-danger'>exection unsuccessful</div>";
						}
					}
				}
			}else{
				
			}


			if(!empty($_POST['delete'])){
				$d_id = $_POST['edit_id'];

				$st2 = $this->con->prepare('DELETE FROM category WHERE cat_id = :id');
				$st2->bindParam(':id', $d_id);
				if($st2->execute()){
					echo "<div class='alert alert-success'>category deleted successfully!</div>";
				}else{
					echo "<div class='alert alert-danger'>deletion unsuccessful</div>";
				}
			}
		}
	}
?>