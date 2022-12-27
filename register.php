<?php
require_once __DIR__ . './vender2/register_if.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css">

    <title>Регистрация</title>
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

    <section class="section__register">
        <div class="container">

            <div class="form">
                <div class="form__logo">
                    <img class="logo" src="./src/img/logo1.svg" alt="">
                </div>
                <h1 class="form__h1">Регистрация</h1>
                <form action="register.php" method="post">
                    <div class="form__register">
                        <label for="email" class="form__label">Адрес электронной почты</label>
                        <input type="text" name="email" value="<?= $email ?? "" ?>"
                            class="form__control <?= isset($errors["email"])? "active-rad" : "" ?>" id="email"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form__text">Используйте ваш e-mail, который был указан при
                            регистрации
                        </div>
                    </div>
                    <div class="form__reg-info">
                        <label for="name" class="form__label">Ваше имя</label>
                        <input type="text" name="name" value="<?= $email ?? "" ?>"
                            class="form__control <?= isset($errors["name"])? "active-rad" : "" ?>" id="name"
                            aria-describedby="nameHelp">
                        <div id="nameHelp" class="form__text">Вы можете указать ФИО или никнейм</div>
                    </div>
                    <div class="form__reg-info">
                        <label for="password" class="form__label">Пароль</label>
                        <input type="password" name="password"
                            class="form__control <?= isset($errors["password"])? "active-rad" : "" ?>" id="password">
                    </div>
                    <div class="form__reg-info">
                        <label for="password_confirmation" class="form__label">Подтверждение пароля</label>
                        <input type="password" name="password_confirmation"
                            class="form__control <?= isset($errors["password_confirmation"])? "active-rad" : "" ?>"
                            id="password_confirmation" aria-describedby="passwordConfirmHelp">
                        <div id="passwordConfirmHelp" class="form__text">Это необходимо, чтобы избежать ошибок при вводе
                            пароля</div>
                    </div>
                    <div class="form__button">
                        <button type="submit" name="register_submit" class="form__btn btn-top">Создать аккаунт</button>
                        <p class="button-logo-true">У меня уже <a href="./login.php">есть аккаунт</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>