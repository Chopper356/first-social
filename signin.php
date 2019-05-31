<?

if ($_POST) {
    require "app/include/database.php";
    require "app/include/functions.php";
    $result = signin($_POST['email'], $_POST['password']);
}

/*if (isset( $_COOKIE['user'])) {
    $value = $_COOKIE['user'] + 1;
}
else {
    $value = 0;
}
echo "Вы посещали эту страницу $_COOKIE[user]"."<h1>Раз</h1>";
*/
require "app/header.php";

?>

<form class="form_sign" action="signin.php" method="post">
    <input type="email" name="email" placeholder="Введите ваш Email">
    <input type="password" name="password" placeholder="Введите свой пароль">
    <button class="submit">Подтвердить</button>
    <a href="/">Восстановить пароль</a>
    <?=$result?>
</form>

<? require "app/footer.php"; ?>