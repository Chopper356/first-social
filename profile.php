<?php
	require 'app/include/database.php';
	require 'app/include/functions.php';
	require 'app/header.php';
?>

<?
	if ($_POST){
		$result = edit_user($_COOKIE['id'], $_POST['password'], $_POST['country'], $_POST['city'], $_POST['birthday']); 
	} 
	$user = get_user($_COOKIE['id']);
?>
<form class="useredit" action="" method="post">
	<div>Редактировать пароль</div>
	<input type="password" name="password">
	<div>Повторите пароль</div>
	<input type="password" name="password2">
	<div>Редактировать страну</div>
	<input type="text" name="country" value="<?=$user['country'];?>">
	<div>Редактировать город</div>
	<input type="text" name="city" value="<?=$user['city'];?>">
	<div>Редактировать день рождения</div>
	<input type="date" name="birthday" value="<?=$user['birthday'];?>">
	<button>Подтвердить</button>
	<?=$result;?>
</form>

