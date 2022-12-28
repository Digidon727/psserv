<?php
require_once __DIR__ . './../vender2/db.php';
require_once __DIR__ . './../vender2/token.php';
if(isset($_POST["login_submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $params =["email" => $email];

    $fetchUser = $dbh->prepare($sql);
    $fetchUser->execute($params);
    $user = $fetchUser->fetch(PDO::FETCH_ASSOC);

    $isNotAuh = false;
    
    if(!$user || !password_verify($password, $user["password"])){
        $isNotAuh = true;
    }else{
        $token = generateToken();
        updateUserToken($dbh, $user["id"], $token);
        setcookie("token", $token);
        header("Location: /profile.php");
    }
}

?>