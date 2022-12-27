<?php

session_start();
require_once 'db.php';

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

if (
    $email === '' ||
    $name === '' ||
    $password === '' ||
    $password_confirmation === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Проверьте правильность введенных полей';
    header('Location: /register.php');
}

if ($password !== $password_confirmation) {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Пароли не совпадают';
    header('Location: /register.php');
}

$store_user = $db->prepare("INSERT INTO `users` (`email`, `name`, `password`) VALUES (:email, :name, :password)");
$store_user->execute([
    "email" => $email,
    "name" => $name,
    "password" => password_hash($password, PASSWORD_DEFAULT),
]);


$_SESSION['is_success_register'] = true;
$_SESSION['success_message'] = 'Регистрация завершена! Авторизируйтесь в форме ниже';
header('Location: /login.php');
