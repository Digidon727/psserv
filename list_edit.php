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

    <section class="section__form">
        <div class="container">
            <div class="register__forms-users">
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
                <h2 class="register__title">Редактирование заявки <span
                        class="form__title-s-red">№-<?= $info["id"]?></span></h2>
                <form action="./vender2/update_list_info.php" method="POST">
                    <input type="hidden" name="infoId" value="<?= $info["id"]?>">
                    <!-- Поле Дата -->
                    <div class="register__info">
                        <label for="articleTitle" class="form-label">Укажите дату заявки</label>
                        <input type="date" value="<?= $info["date"]?>" name="date_dmy" class="form-date"
                            id="articleTitle">
                    </div>
                    <!-- Поле Статус  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите статус</label>
                        <!-- <input type="text" class="form-control-input" name="status_l" id="articleTitle" required> -->
                        <select value="<?= $info["status"]?>" name="status_l" id="city-select" class="form-date">
                            <option>Приняты</option>
                            <option>Выданные</option>
                        </select>
                    </div>
                    <!-- Поле Статус  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите тип устройства</label>
                        <input type="text" value="<?= $info["device_type"]?>" class="form-control-input"
                            name="type_device" id="articleTitle" required>
                    </div>
                    <!-- Поле модель  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Укажите модель </label>
                        <input type="text" value="<?= $info["model"]?>" class="form-control-input" name="model"
                            id="articleTitle" required>
                    </div>
                    <!-- Поле Имя  -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Имя</label>
                        <input type="text" value="<?= $info["name"]?>" name="name_user" class="form-control-input"
                            id="articleTitle" required>
                    </div>
                    <!-- Поле номер телефона -->
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Номер телефона</label>
                        <input type="text" value="<?= $info["phone"]?>" class="form-control-input" name="phone"
                            id="articleTitle" required>
                    </div>
                    <div class="register__info">
                        <label for="articleBody" class="form-label">Мастер </label>
                        <input type="text" value="<?= $info["master"]?>" name="name_master" class="form-control-input"
                            id="articleTitle" required>
                    </div>

                    <div class="register__info">
                        <input type="checkbox" name="is_public" class="form-check-input" id="isPublic"
                            <?= $info["is_public"] == 1 ? "checked" : "" ?>>
                        <label class="form-check-label" for="isPublic">Принять заявку</label>
                    </div>
                    <button type="submit" name="profile_submit" class="btn-top">Изменить</button>
                </form>
            </div>
        </div>
    </section>


    <script src="./js/main.js"></script>

</body>

</html>