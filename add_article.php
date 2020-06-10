<!DOCTYPE html>
<html>
<head>
	<title>Test article</title>
</head>
<body>	
	<?php 


	?>
	<form method="POST" action="add_article.php?id=<?php $_GET['id'];?>">
			<input type="text" name="article" value="" required placeholder="Article"><br />
			<textarea name="article_content" placeholder=" content"></textarea><br />
			<input type="submit" name="submit" value="<?php ?>Submit">
	</form>
	<?php 

	$connection = new mysqli('localhost', 'root', '', 'article');
		if($connection){
			if(isset($_POST['submit'])){
				$article = $_POST['article'];
				$content = $_POST['article_content'];

					if(isset($_GET['id']) != 0 ){
						$update = "UPDATE articles SET a_title='".$article."', a_content='".$content."'
						WHERE id='".$_GET['id']."'  ";
						$update_result = mysqli_query($update,$connection);
						if($update_result){
							echo 'Article updated successfully';
						}
						else{
							echo 'Article not updated error';
						}

					}
				else{
					$query = "INSERT INTO articles (id, a_title,a_content) VALUES('', '".$article."','".$content."')";	
					$result = mysqli_query($connection,$query);
					if($result){
						echo 'Article successfully added.';
					}
					else{
						echo 'Something error';
					}
				}
				
			}
		}
		else{
			echo 'Not connected';
		}
	?>
</body>
<html>
