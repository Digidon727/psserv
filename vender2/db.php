<?php
$host = "PCserv";
$dbname = "ps_serv";
$username = "root";
$password = "root";


try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Подключение успешное!";
} catch (PDOException $e) {
    echo "Ошибка подключения к БД!: " . $e->getMessage() . "<br/>";
    die();
}

?>