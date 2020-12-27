<?php

session_start();
require_once 'connect.php';

$login = htmlspecialchars(trim($_POST['login']));
$first_name = htmlspecialchars(trim($_POST['first_name']));
$second_name = htmlspecialchars(trim($_POST['second_name']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$password_confirm = htmlspecialchars(trim($_POST['password_confirm']));



    $check_user = mysqli_query(getConnection(),"SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Извините, но данное имя пользователя уже занято';
        header('Location: ../register.php');
        exit();
    }

    if (!preg_match("/^[a-zA-Z0-9\-_]+$/", $login)) {
        $_SESSION['message'] = 'Логин должен состоять из букв английского алфавита и цифр';
        header('Location: ../register.php');
        exit();
    }

    if (strlen($login) < 1 or strlen($login) > 30) {
        $_SESSION['message'] = 'Логин должен содержать не менее 2 и не более 30 символов';
        header('Location: ../register.php');
        exit();
    }

    if (!preg_match("/^[a-zA-Z\-_]+$/", $first_name)) {
        $_SESSION['message'] = 'Имя должно состоять только из букв английского алфавита';
        header('Location: ../register.php');
        exit();
    }

    if (strlen($first_name) < 2 or strlen($first_name) > 20) {
        $_SESSION['message'] = 'Имя должно содержать не менее 2 и не более 20 символов';
        header('Location: ../register.php');
        exit();
    }

    if (!preg_match("/^[a-zA-Z\-_]+$/", $second_name)) {
        $_SESSION['message'] = 'Фамилия должна состоять только из букв английского алфавита';
        header('Location: ../register.php');
        exit();
    }

    if (strlen($second_name) < 2 or strlen($second_name) > 20) {
        $_SESSION['message'] = 'Фамилия должна содержать не менее 2 и не более 20 символов';
        header('Location: ../register.php');
        exit();
    }

    if (empty($email)) {
        $_SESSION['message'] = 'Вы не указали адрес электронной почты';
        header('Location: ../register.php');
        exit();
    }

    $check_email = mysqli_query(getConnection(),"SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['message'] = 'Извините, но данный адрес электронной почты уже зарегистрирован';
        header('Location: ../register.php');
        exit();
    }

    if (!preg_match("/^[a-zA-Z0-9\-_]+$/", $password)) {
        $_SESSION['message'] = 'Пароль должен состоять только из букв английского алфавита и цифр';
        header('Location: ../register.php');
        exit();
    }

    if (strlen($password) < 8 or strlen($password) > 30) {
        $_SESSION['message'] = 'Пароль должен содержать не менее 8 и не более 20 символов';
        header('Location: ../register.php');
        exit();
    }

    if ($password === $password_confirm) {
        $password = md5($password);
        mysqli_query(getConnection(), "INSERT INTO users (`id`, `login`, `first_name`, `second_name`, `email`, `password`)
                                      VALUES (NULL, '$login', '$first_name', '$second_name', '$email', '$password')");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../index.php');
    } else {

        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
        exit();
    }














