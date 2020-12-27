<?php

session_start();
require_once 'connect.php';

$login = htmlentities(trim($_POST['login']));
$password = htmlentities(trim(md5($_POST['password'])));





$check_user = mysqli_query(getConnection(), "SELECT * FROM users WHERE login = '$login' AND password = '$password'");

if (mysqli_num_rows($check_user) > 0) {
    // Вы авторизированы
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}



