<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TypeCodeInc</title>
</head>
<body>
	<?php
		require 'app/include/database.php';
		require 'app/include/functions.php';
		require 'app/header.php';
	?>
	<div class="wrap">
		<div class="posts">
			<? 
				$get_category = $_GET['id'];
				$posts = getPostByCategory($category_id); 
			?>
			<?var_dump($posts)?>
			<? foreach($posts as $post): ?>
				<div class="post">
					<img src="<?=$post['image']?>" class="image">
					<a href="/post.php?id=<?=$post['id']?>" class="title"><?=$post['name']?></a>
					<div class="content"><?=mb_substr($post['content'],0, 128, 'UTF-8')?>...</div>
					<div class="info">
						<div>Категория: <a href="category.php?id=<?=$post['id']?>"><?=$post['id']?></a></div>
						<div>Дата: <?=$post['datatime']?></div>
						<a href="/post.php?id=<?=$post['id']?>" class="button">Читать полностью</a>
					</div>
				</div>
			<? endforeach; ?>
		</div>
		
		<?require 'app/sidebar.php';?>
	</div>
</body>
</html>
