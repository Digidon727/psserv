<?php
require_once __DIR__ . './vender2/db.php';
require_once __DIR__ . './vender2/token.php';

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
    <title>Лист Заявок </title>
</head>

<body>
    <section class="profile">
        <div class="container">
            <div class="profile__menu">
                <div>
                    <a href="#" class="logo_img">
                        <img src="src/img/logo1.svg" alt="">
                    </a>
                </div>
                <div class="profile__menu-nav">
                    <a class="btn-top item" href="./profile.php">Регистрация</a>
                    <a class="btn-top item" href="./list.php">Лист заявок</a>
                    <a class="btn-top item" href="./list_true.php">Выполненные заявки</a>
                </div>
                <div class="profile__reg">

                    <div class="info">
                        <h2>Приветствую: <?= $user["name"]?></h2>
                        <p>Ваш логин: <?= $user["email"] ?></p>
                    </div>
                    <form action="/profile.php" method="post">
                        <button type="submit" name="logout-submit" class="btn-top">Выход</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="form-list">
        <div class="container">
            <?php
                $id = $_GET["id"];
                $prepare = $dbh->prepare("SELECT * FROM `user_register` WHERE id = :id");
                $prepare->execute(["id" => $id]);
                $info = $prepare->fetch(PDO::FETCH_ASSOC);
                if(!$info ){
                    ?>
            <h1 class="error-404">404</h1>
            <p class="error-text">Данная страница не существует!</p>
            <?php
                    die();
                }
                
            ?>
            <div>
                <h1 class="form__title">Подробная информация о заказе <span
                        class="form__title-s-red">№-<?= $info["id"]?></span></h1>
            </div>
            <div class="form__list-z">
                <div class="form-info-b">
                    <h3 class="form-info-list">Дата регистрации: </h3>
                    <p class="form-info-list-p"><?= $info["date"]?></p>
                </div>
                <div class="form-info-b">
                    <h3 class="form-info-list">Статус: </h3>
                    <p class="form-info-list-p"><?= $info["status"]?></p>
                </div>

                <div class="form-info-b">
                    <h3 class="form-info-list">Тип устройства: </h3>
                    <p class="form-info-list-p"><?= $info["device_type"]?></p>
                </div>
                <div class="form-info-b">
                    <h3 class="form-info-list">Модель устройства: </h3>
                    <p class="form-info-list-p"><?= $info["model"]?></p>
                </div>
                <div class="form-info-b">
                    <h3 class="form-info-list">Заявка оформлена на Имя: </h3>
                    <p class="form-info-list-p"><?= $info["name"]?></p>
                </div>
                <div class="form-info-b">
                    <h3 class="form-info-list">Телефон заказчика:</h3>
                    <p class="form-info-list-p"><?= $info["phone"]?></p>
                </div>
                <div class="form-info-b">
                    <h3 class="form-info-list">Выполняет ремонт: </h3>
                    <p class="form-info-list-p"><?= $info["master"]?></p>
                </div>

            </div>

        </div>
    </section>

</body>

</html>