<?php
$link = mysqli_connect('localhost','root','','typecodesite');

if (mysqli_connect_errno()){
    echo 'Ошибка('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}
?>