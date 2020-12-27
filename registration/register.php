<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация и регистрация</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
        <body>
        <!--Форма регистрации-->
            <form action="vendor/signup.php" method="post">
            <label>Логин</label>
                <input type="text" name="login" maxlength="30" placeholder="Введите логин" required>
            <label>Имя</label>
                <input type="text" name="first_name" maxlength="30" placeholder="Введите имя" required>
            <label>Фамилия</label>
                <input type="text" name="second_name" maxlength="30" placeholder="Введите фамилию">
            <label>Email</label>
                <input type="email" name="email" placeholder="Введите адрес электронной почты">
            <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль" required>
            <label>Подтверждение пароля</label>
                <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
            <button type="submit">Зарегистрироваться</button>
            <p>
                У Вас уже есть аккаунт? - <a href="index.php">Авторизируйтесь</a>
            </p>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
            </p>
        </form>
    </body>
</html>