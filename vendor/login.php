<?php

session_start();
require_once 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (
    $email === '' ||
    $password === '' ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Проверьте правильность введенных полей';
    header('Location: /login.php');
}

$user = $db->prepare("SELECT * FROM `users` WHERE `email` = :email");
$user->execute([
    "email" => $email
]);

$user = $user->fetch();

if (!$user) {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Пользователь не найден';
    header('Location: /login.php');
}

if (password_verify($password, $user["password"]) === true) {
    $_SESSION["auth"] = true;
    $_SESSION["user"] = [
        "id" => $user["id"],
        "name" => $user["name"],
        "email" => $user["email"]
    ];

    header('Location: /profile.php');

} else {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Не верный пароль';
    header('Location: /login.php');
}



