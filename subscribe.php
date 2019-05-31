<?php
require 'app/include/database.php';
require 'app/include/functions.php';

if ($_POST['email']) {
	$email = trim($_POST['email']);
	$result = insert_subscriber($email);
	header("Location: /?subscribed=$result");
}
else {
	header('Location: /');
}