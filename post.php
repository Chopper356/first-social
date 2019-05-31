<?php
require 'app/include/database.php';
require 'app/include/functions.php';
require 'app/header.php';
$post_id = $_GET["id"];
?>

<? $post = get_post_by_id($post_id); ?>

<div class="postpage">
	<div class="post">
		<img src="<?=$post['image']?>" class="image">
		<a href="/post.php?id=<?=$post['id']?>" class="title"><?=$post['name']?></a>
		<div class="content"><?=$post['content']?></div>
		<div class="info">
			<div>Категория: <a href="category.php?id=<?=$post['id']?>"><?=$post['id']?></a></div>
			<div>Дата: <?=$post['datatime']?></div>
		</div>
	</div>
</div>

<!--Обратная связь-->

<?
/*
if (isset($_POST["send"])) {
	$from = htmlspecialchars($_POST["from"]);
	$to = htmlspecialchars($_POST["to"]);
	$subject = htmlspecialchars($_POST["subject"]);
	$message = htmlspecialchars($_POST["message"]);
	$_SESSION["from"] = $from;
	$_SESSION["to"] = $to;
	$_SESSION["subject"] = $subject;
	$_SESSION["message"] = $message;
	$error_from = "";
	$error_to = "";
	$error_subject = "";
	$error_message = "";
	$error = false;

	if ($from == "" || !preg_match('/@/', $from)) {
		$error_from = "Введите корректный email";
		$error = true;
	}
	if ($to == "" || !preg_match('/@/', $to)) {
		$error_to = "Введите корректный email";
		$error = true;
	}
	if (strlen($subject) == 0) {
		$error_subject = "Введите корректную тему";
		$error = true;
	}
	if (strlen($message) == 0) {
		$error_message = "Введите корректное сообщение";
		$error = true;
	}

	if (!$error) {
		$subject = "=?utf-8?B?".base64_encode($subject)."=?";
		$headers = "From: $from\r\nReply-to: $form\r\nContent-type:text/plain; charset=utf-8\r\n";
		mail($to, $subject, $message, $headers);
		header("Location: /");
		exit;
	}
}
*/
?>
<!--
<form class="feedback" name="feedback" action="" method="post">
	<label>От кого:</label><br></b>
	<input type="text" name="from" value="<?=$_SESSION["from"]?>" ><br></b>
	<span><?=$error_from?></span>
	<label>Кому:</label><br></b>
	<input type="text" name="to" value="<?=$_SESSION["to"]?>"><br>
	<span><?=$error_to?></span>
	</b>
	<label>Тема:</label><br></b>
	<input type="text" name="subject" value="<?=$_SESSION["subject"]?>"><br>
	<span><?=$error_subject?></span>
	</b>
	<label>Сообщение:</label><br></b>
	<textarea name="message" cols="30" rows="10"><?=$_SESSION["message"]?>"</textarea><br>
	<span><?=$error_message?></span>
	</b>
	<input type="submit" name="send" value="Отправить"><br></b>



</form>
-->


