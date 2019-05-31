<?php
	require 'app/include/database.php';
	require 'app/include/functions.php';
	require 'app/header.php';
?>

<?
	// ТУТ СДЕЛАТЬ ОБРАБОТКУ СООБЩЕНИЙ



	///////////////

	$user = get_user($_GET['id']);
?>

<div class="userpage wrap">
	<div class="profile block">
		<img src="/img/profile.png" class="avatar">

		<div class="info">
			<div class="name"><?=$user['name'];?></div>
			<div class="email"><?=$user['email'];?></div>
			<div class="country"><?=$user['country'];?></div>
			<div class="city"><?=$user['city']?></div>
			<div class="birthday"><?=$user['birthday']?></div>
			<div class="date">На сайте с: 21.05.2019</div>
			<? if ($user['id'] == $_COOKIE['id']): ?>
				<a href="profile.php">Редактировать</a>
			<? endif; ?>
		</div>
	</div>
	

	<? if ($_COOKIE['id']): ?>
	<div class="wall block">
		<form method="post" action="">
			<textarea placeholder="Your message here..." rows="4" name="message"></textarea>
			<button>Отправить</button>
		</form>
	</div>
	<? endif; ?>

	<div class="wall block">
		<?
			if ($_POST) {
				$user_from = $_COOKIE['id'];
				$user_to = $_GET['id'];
				$message = $_POST['message'];
				$result = wall_post($user_from, $user_to, $message);
			}
			$posts = get_wall($_GET['id']);
			foreach ($posts as $post): 
		?>
		<div class="post">
			<div class="head">
				<img src="/img/profile.png" class="avatar">
				<div class="info">
					<a class="name" href="user.php?id=<?=$post['user_from'];?>"><?=$post['name'];?></a>
					<div class="date"><?=date("d.m.Y - H:i", $post['date']);?></div>
				</div>
			</div>

			<div class="message"><?=$post['text'];?></div>
		</div>
		<? endforeach; ?>

		<? if (!$post) echo "<div class='empty'>Постов ещё нет, будьте первым!</div>"; ?>
	</div>
</div>
