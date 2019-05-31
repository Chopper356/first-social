<?php
	require 'app/include/database.php';
	require 'app/include/functions.php';
	require 'app/header.php';
?>
<div class="wrapper">
	<div class="postpage">
		<?
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = 5;
			$offset = $limit * ($page - 1);
			$posts = get_posts_limit($limit, $offset);
		?>
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

		<?
		$count = posts_count();
		$per_page = 5;
		$pages = ceil($count / $per_page);
		

		for ($a = 1; $a <= $pages; $a++):?>
			<a href="/?page=<?=$a?>"><?=$a?></a>
		<? endfor; ?>
	</div>
	
	<?require 'app/sidebar.php';?>
</div>
<? require 'app/footer.php'; ?>