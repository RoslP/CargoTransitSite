<?php
require('app/include/partition.php');
require('app/controllers/users.php');
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
<?php $header = new Partition(false, true);
$header->show();
?>
<!--Main Block-->
<div class="container">
    <form class="row registration-form  justify-content-center justify-content-md-center" method="post"
          action="reg.php">
        <h4>Форма регистрации</h4>
        <div class="col-12 col-md-4">
            <label for="validationName" class="form-label">Имя</label>
            <input name="Name" type="text" class="form-control" id="validationName" placeholder="Введите имя" required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationSecondNameInput" class="form-label">Фамилия</label>
            <input name="Second_name" type="text" class="form-control" id="validationSecondNameInput"
                   placeholder="Введите фамилию"
                   required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationPatronymic" class="form-label">Отчество</label>
            <input name="Patronymic" type="text" class="form-control" id="validationPatronymic"
                   placeholder="Введите отчество" required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationUsername" class="form-label">Логин</label>
            <div class="input-group">
                <span class="input-group-text" id="validationUsername">@</span>
                <input name="Login" type="text" class="form-control" id="validationUsernameInput"
                       aria-describedby="inputGroupPrepend2" placeholder="Введите логин" required>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationDefaultUsername" class="form-label">Пароль</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input name="Password" type="text" class="form-control" id="validationDefaultUsername"
                       aria-describedby="inputGroupPrepend2" placeholder="Введите пароль" required>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationCompany" class="form-label">Компания</label>
            <input name="Company" type="text" class="form-control" id="validationCompany"
                   placeholder="Введите название компании"
                   required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationAddress" class="form-label">Адрес</label>
            <input name="Address" type="text" class="form-control" id="validationAddress"
                   placeholder="Введите свой адрес" required>
        </div>
        <div class="w-100"></div>
        <div class="col-12  col-md-4">
            <label for="validationPhone" class="form-label">Телефон</label>
            <input name="Phone" type="text" class="form-control" id="validationPhone"
                   placeholder="Введите номер телефона" required>
        </div>
        <div class="w-100"></div>
        <div class="row justify-content-center justify-content-md-center">
            <div class="form-check-reg form-check-inline col-12 col-md-4">
                <input name="IsManagerOrCustomer" type="radio" class="form-check-input" id="validationFormCheck2" value="0" required>
                <label class="form-check-label" for="validationFormCheck2">Заказчик</label>
            </div>
            <div class="w-100"></div>
            <div class="form-check-reg form-check-inline col-12 col-md-4">
                <input name="IsManagerOrCustomer" type="radio" class="form-check-input" id="validationFormCheck3" value="1" required>
                <label class="form-check-label" for="validationFormCheck3">Менеджер</label>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <button name="button-reg" class="btn btn-primary" type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>

<!--footer начало-->
<?php $header = new Partition(true);
$header->show();
?>
<!--footer конец-->

</body>

</html>