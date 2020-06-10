<!DOCTYPE html>
<html>
<head>
	<title>Test article</title>
</head>
<body>	
	<a href="add_article.php?id=0">Add Article</a>

	<?php 
		$connection = new mysqli('localhost', 'root', '', 'article');
		$article_results = array();
		$query_result = "SELECT id, a_title, a_content, a_date FROM articles";
		$ar_results = mysqli_query($connection, $query_result);
		while($rows = mysqli_fetch_assoc($ar_results)){
			$article_results[] = $rows;
		}
		if(empty($article_results)){
			$article_results = array();
		}

	?>
	<table>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Content</th>
			<th>Date</th>
			<th cols="2">Actions</th>
		</tr>
		<?php foreach($article_results as $i => $article_row):?>
			<tr>
				<td><?php echo $article_row['id'];?></td>
				<td><?php echo $article_row['a_title'];?></td>
				<td><?php echo $article_row['a_content'];?></td>
				<td><?php echo $article_row['a_date'];?></td>
				<td><a href="add_article.php?id=<?php echo $article_row['id']; ?>">Edit</a> <a href="#"> Delete</a></td>
			<tr>
		<?php endforeach;?>
	</table>

</body>
</html>