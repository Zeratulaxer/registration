<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация и регистрация</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
        <body>
        <!--Форма авторизации-->
            <form action="vendor/signin.php" method="post">
            <label>Логин</label>
                <input type="text" name="login" placeholder="Введите логин" required>
            <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль" required>
            <button type="submit">Войти</button>
            <p>
                У Вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a>
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