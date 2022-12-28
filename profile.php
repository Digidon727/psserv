<?php
require_once __DIR__ . './vender2/db.php';
require_once __DIR__ . './vender2/token.php';
require_once __DIR__ . './vender2/create.php';
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

    <section class="profile">
        <div class="container">
            <div class="profile__menu">
                <div>
                    <a href="#" class="logo_img">
                        <img src="src/img/logo1.svg" alt="">
                    </a>
                </div>
                <div class="profile__menu-nav">
                    <a class="btn-top item" href="#">Регистрация</a>
                    <a class="btn-top item" href="#">Лист заявок</a>
                    <a class="btn-top item" href="#">Выполненные заявки</a>
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

    <section class="section__form">
        <div class="container">
            <div class="register__forms-users">
                <h2 class="register__title">Регистрация заявки</h2>
                <form action="./vender2/create.php" method="POST">
                    <!-- Поле Дата -->
                    <div class="register__info">
                        <label for="articleTitle" class="form-label">Укажите дату заявки</label>
                        <input type="date" value="<?= date("d/m/Y");?>" name="date_dmy" class="form-date"
                            id="articleTitle">
                    </div>
                    <!-- Поле Статус  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите статус</label>
                        <input type="text" class="form-control-input" name="status_l" id="articleTitle">
                    </div>
                    <!-- Поле Статус  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите тип устройства</label>
                        <input type="text" class="form-control-input" name="type_device" id="articleTitle">
                    </div>
                    <!-- Поле модель  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите модель </label>
                        <input type="text" class="form-control-input" name="model" id="articleTitle">
                    </div>
                    <!-- Поле Имя  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Имя</label>
                        <input type="text" name="name_user" class="form-control-input" id="articleTitle">
                    </div>
                    <!-- Поле номер телефона -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Номер телефона</label>
                        <input type="text" class="form-control-input" name="phone" id="articleTitle">
                    </div>
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Мастер </label>
                        <input type="text" name="name_master" class="form-control-input" id="articleTitle">
                    </div>

                    <div class="register__info">
                        <input type="checkbox" name="is_public" class="form-check-input" id="isPublic">
                        <label class="form-check-label" for="isPublic">Выполнено</label>
                    </div>
                    <button type="submit" name="profile_submit" class="btn-top">Добавить</button>
                </form>
            </div>
        </div>
    </section>


</body>

</html>