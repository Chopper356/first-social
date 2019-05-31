<?sessist?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <div class="top">
        <div class="side">
            <a href="/" >TypeCodeInc</a>
            <a href="users.php" class="topper">Пользователи</a>
        </div>

        <? if (!$_COOKIE['id']): ?>
        
        <div class="side"> 
            <a href="signin.php" class="sign topper">Вход</a>
            <a href="signup.php" class="sign topper">Регистрация</a>   
        </div>   
        <? endif; ?> 
    </div>
