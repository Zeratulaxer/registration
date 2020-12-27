<?php

function getConnection() {
    static $connect;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'zeratul', 'zeratulaxer12345', 'php_registration');
    }

    if ($connect === false) {
        die('Ошибка при подключении к базе данных "php_registration"');
    }

    return $connect;
}
