<?php
    require 'app/include/database.php';
    require 'app/include/functions.php';
    require 'app/header.php';
?>

<?
    $users = get_users();
    foreach ($users as $user): 
?>

<div class="userpage wrap">
    <a href="user.php?id=<?=$user['id']?>" class="block link"><img src="/img/profile.png"><?=$user['name'];?></a>    
</div>

<? endforeach; ?>

    
