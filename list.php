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
            <div>
                <h1 class="form__title">Лист активных заявок </h1>
            </div>

            <div>
                <ul class="responsive-tables">
                    <li class="table-headers">
                        <div class="col col-1">№</div>
                        <div class="col col-2">Дата</div>
                        <div class="col col-3">Статус</div>
                        <div class="col col-4">Тип устройства </div>
                        <div class="col col-5">Модель</div>
                        <div class="col col-6">Имя</div>
                        <div class="col col-7">Номер телефона </div>
                        <div class="col col-8">Мастер</div>
                        <div class="col col-9"></div>
                        <div class="col col-10"></div>
                    </li>

                    <?php
                    $articles = $dbh->query("SELECT * FROM `user_register`")->fetchAll(PDO::FETCH_ASSOC);
                    foreach($articles as $article){
                        $article["is_public"];
                        if($article["is_public"] == 0){
                            continue;
                            
                        }
                       ?>
                    <li class="table-row">
                        <div class="col col-1" data-label="Job Id"><?= $article["id"]?></div>
                        <div class="col col-2" data-label="Customer Name"><?= $article["date"]?></div>
                        <div class="col col-3" data-label="Amount"><?= $article["status"]?></div>
                        <div class="col col-4" data-label="Payment Status"><?= $article["device_type"]?></div>
                        <div class="col col-5" data-label="Amount"><?= $article["model"]?></div>
                        <div class="col col-6" data-label="Payment Status"><?= $article["name"]?></div>
                        <div class="col col-7" data-label="Amount"><?= $article["phone"]?></div>
                        <div class="col col-8" data-label="Payment Status"><?= $article["master"]?></div>
                        <div class="col col-9" data-label="Payment Status"><a
                                href="./list_info.php?id=<?=$article["id"]?>" class="btn-top table_b">Подробней</a>
                        </div>
                        <div class="col col-10" data-label="Payment Status"><a
                                href="./list_edit.php?id=<?=$article["id"]?>" class="btn-top">Изменить </a>
                        </div>

                    </li>
                    <?php
                    }
                    
                    ?>
                    <!-- <li class="table-row">
                        <div class="col col-1" data-label="Job Id">1</div>
                        <div class="col col-2" data-label="Customer Name">28.12.2022</div>
                        <div class="col col-3" data-label="Amount">Принят</div>
                        <div class="col col-4" data-label="Payment Status">Системный блок</div>
                        <div class="col col-5" data-label="Amount">I5200</div>
                        <div class="col col-6" data-label="Payment Status">Иван</div>
                        <div class="col col-7" data-label="Amount">599595959</div>
                        <div class="col col-8" data-label="Payment Status">Андрей</div>
                        <div class="col col-9" data-label="Payment Status"><a href="#"
                                class="btn-top table_b">Подробней</a>
                        </div>
                        <div class="col col-10" data-label="Payment Status"><a href="#" class="btn-top">Изменить </a>
                        </div>

                    </li> -->
                </ul>
            </div>
        </div>
    </section>

</body>

</html>