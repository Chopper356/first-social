<div class="sidebar">
	<form action="subscribe.php" method="post">
		<div class="text">Подпишись на новости!</div>
		<input class="email" type="email" name="email" value="" placeholder="Введите ваш Email" required>
		<button class="subscribe">Подписаться</button>
		<?=$_GET['subscribed']?>
	</form>
</div>