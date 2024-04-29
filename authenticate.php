<?php
include 'app/database/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cargo Transit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--    подключение к кастомным иконкам font awesome-->
    <script src="https://kit.fontawesome.com/7329f6dda8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <!--    скрипты необходимые для карусели и других элементов bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    <!--    подключение стрилей-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--    подключение шрифтов от google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<!--добавляет контейнер на всю ширину страницы класс из bootstrap5-->
<?php require 'app/include/header.php'?>
<!--Main Block-->
<div class="container">
    <form class="row registration-form  justify-content-center justify-content-md-center" method="post"
          action="reg.php">
        <h4>Авторизация</h4>
        <div class="col-12 col-md-4">
            <label for="validationLoginAuth" class="form-label">Логин</label>
            <input type="text" class="form-control" id="validationLoginAuth" placeholder="Введите логин" required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationPasswordAuth" class="form-label">Пароль</label>
            <input type="text" class="form-control" id="validationPasswordAuth" placeholder="Введите пароль"
                   required>
        </div>
        <div class="w-100"></div>
        <div id="AuthBnt" class=" col-12 col-md-4">
            <button class="btn btn-primary col-md-6" type="button">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>


<!--footer начало-->
<?php require 'app/include/footer.php'?>
<!--footer конец-->

</body>

</html>