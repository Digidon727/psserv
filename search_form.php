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
            <div class="form__title-search">

                <h1 class="form__title">Поиск заявок </h1>
                <div class="form-info-search">
                    <form class="form-search-inp" method="post" action="search_form.php">
                        <input class="search-inp1" type="text" name="search" placeholder="Введите..." required>
                        <input class="btn-top" type="submit" value="Поиск">
                    </form>
                </div>
            </div>
            <div>
                <div id="results">
                    <?php
                    $search =$_POST["search"];
                    if (isset($search)){
                        $sql = "SELECT `id`, `name`, `phone` FROM `user_register` WHERE `id` = :search OR `name` = :search OR `phone` = :search  ";
                        $params = ['search' => $search];
                        $fetchSearch = $dbh->prepare($sql);
                        $fetchSearch->execute($params);
                        $results = $fetchSearch->fetchAll();
                        // $stmt = $dbh->prepare("SELECT `id`, `name`, `phone` FROM `user_register` WHERE `id` = $search ");
                        // $stmt->execute(["%".$search."%", "%".$search."%", "%".$search."%"]);
                        // $results = $stmt->fetchAll();
                        
                    if (count($results) > 0) { foreach ($results as $r) {
                        ?>
                    <ul class="responsive-tables">
                        <li class="table-headers">
                            <div class="col col-1">№</div>
                            <div class="col col-6">Имя</div>
                            <div class="col col-7">Номер телефона </div>
                            <div class="col col-9 headers-9"></div>
                            <div class="col col-10"></div>
                        </li>
                        <li class="table-row">
                            <div class="col col-1" data-label="Job Id"><?= $r["id"]?></div>
                            <div class="col col-6" data-label="Payment Status"><?= $r["name"]?></div>
                            <div class="col col-7" data-label="Amount"><?= $r["phone"]?></div>


                            <div class="col col-9" data-label="Payment Status"><a
                                    href="./list_info.php?id=<?= $r["id"]?>" class="btn-top table_b">Подробней</a>
                            </div>
                            <div class="col col-10" data-label="Payment Status"><a
                                    href="./list_edit.php?id=<?= $r["id"]?>" class="btn-top">Изменить </a>
                            </div>
                        </li>
                    </ul>

                    <?php
                    }
                    } else { 
                        echo "No results found"; 
                    }
                    }
                
            
                    ?>
                </div>
            </div>
        </div>
    </section>

</body>

</html>