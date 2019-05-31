<? 
require "app/header.php";
require "app/footer.php";

if ($_POST) {
    require "app/include/database.php";
    require "app/include/functions.php";

    if ($_POST['password'] == $_POST['password2']) {
        $result = signup($_POST['name'], $_POST['email'], $_POST['password']);
    }
    else {
        echo 'Пароли не совпадают';
    }
}

?>
<form class="form_sign" action="signup.php" method="post">
    <div class="input">
        <input type="text" name="name" placeholder="Введите ваше имя">
        <input type="email" name="email" placeholder="Введите ваш Email"> 
        <input type="password" name="password" placeholder="Введите ваш пароль">
        <input type="password" name="password2" placeholder="Введите ваш пароль">
        <button class="submit">Подтвердить</button>
    </div>
    <?=$result;?>
</form>