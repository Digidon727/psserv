<?php
require_once __DIR__ . './vender2/db.php';
require_once __DIR__ . './vender2/token.php';
//выход из системы
if(isset($_POST["logout-submit"])){
    setcookie("token", NULL);
    unset($_COOKIE);
    header("Location: /login.php");
}

if(isset( $_COOKIE["token"])){
    $user = fetchUserByToken($dbh, $_COOKIE["token"]);
    if(!$user){
        header("Location: /login.php");
    }
}else{
    header("Location: /login.php");
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <title>Личный кабинет</title>
</head>

<body>
    <main id="main">
        <div class="container">
            <a href="#" class="logo_img">
                <img src="src/img/logo1.svg" alt="">
            </a>

            <div class="p">
                <div class="profile">
                    <div class="" role=" alert">
                        Добро пожаловать в систему!
                    </div>
                    <div class="info">
                        <h2>Ваш id: <?= $user["id"]?></h2>
                        <h2>Приветствую: <?= $user["name"]?></h2>
                        <p>Ваш логин: <?= $user["email"] ?></p>
                    </div>
                </div>
            </div>
            <form action="/profile.php" method="post">
                <button type="submit" name="logout-submit" class="btn-top">Выход</button>
            </form>
        </div>
    </main>

</body>

</html>