<?php
require_once __DIR__ . './vender2/login_if.php';
require_once __DIR__ . './vender2/token.php';


if(isset( $_COOKIE["token"])){
    $user = fetchUserByToken($dbh, $_COOKIE["token"]);
    if($user){
        header("Location: /profile.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">
    <title>Вход</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="menu">
                <a href="./index.php"><img class="logo" src="./src/img/logo1.svg" alt=""></a>
                <div class="menu__btns">
                    <a href="./register.php" class="menu__btn">Регистрация</a>
                    <a href="./login.php" class="menu__btn">Вход</a>
                </div>
            </div>
        </div>
    </header>
    <section class="section__login">
        <div class="container">
            <div class="form">
                <div class="form__logo">
                    <img class="logo" src="./src/img/logo1.svg" alt="">
                </div>

                <h1>Вход в систему</h1>
                <?php if(isset($isNotAuh) && $isNotAuh ){
                        ?>
                <div class="alert">Неверный логин или пароль</div>
                <?php
                }
               ?>
                <form action="/login.php" method="post">

                    <div class="form__info">
                        <label for="email" class="form__label">Адрес электронной почты</label>
                        <input type="email" name="email" class="form__control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form__text">E-mail будет использован при входе в систему</div>
                    </div>
                    <div class="form__password">
                        <label for="password" class="form__label">Пароль</label>
                        <input type="password" name="password" class="form__control-password-tow" id="password">
                    </div>
                    <div class="form__button">
                        <button type="submit" name="login_submit" class="form__btn btn-top">Авторизоваться в
                            системе</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

</body>

</html>