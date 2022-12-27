<?php
// Подключение к БД
require_once __DIR__ . './../vender2/db.php';

if(isset($_POST["register_submit"])){ 

    // Получение данных из HTML
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];



    // Проверка ввода данных

    function validateRegister(array $data): array{
        $errors = [];
        if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = true; 
        }
        if(empty($data["name"])){
            $errors["name"] = true; 
        }
        if(empty($data["password"]) || empty($data["password_confirmation"]) || $data["password"] != $data["password_confirmation"]){
            $errors["password"] = true; 
        }
        return $errors;
    };

    $errors = validateRegister($_POST);

    // Проверка что массив пустой или нет
    if(empty($errors)){
        // После выполняется следующий блок 
            // Добавление данных через sql запрос
        $sql = "INSERT INTO `users`(`email`, `name`, `password`) VALUES (:email, :name, :password)";
        $params = [
            "email" => $email,
            "name" => $name,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ];
        $dbh->prepare($sql)->execute($params);
        header("Location: /login.php");
    }
}

?>