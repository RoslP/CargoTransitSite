<?php
require '../../App/Call/Call.php';
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
    <!--    Добавляю j-query-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--    Добавляю свой js-->
    <script src="/src/assets/js/OrderProcessing.js"></script>
    <!--    ajax отправляемый на сервер-->
    <script src="/src/assets/js/ManagerProcessing.js"></script>
    <!--    подключение стрилей-->
    <link rel="stylesheet" href="../../assets/css/admh.css">
    <!--    подключение шрифтов от google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require '../Admin/AdminHeader.php' ?>

<!--блок Main-->
<div class="container">
    <h2>Оформить заказ на грузоперевозку</h2>
    <div class="row">
        <div class="createCargo col-4">
            <div>
                <label>Введите название груза</label>
                <input id="cargoName" type="text">
            </div>
            <div class="w-100"></div>
            <div>
                <label>Введите вес товара в кг.</label>
                <input id="cargoWeight" type="text">
            </div>
            <div class="w-100"></div>
            <div>
                <label>Выберите тип упаковки</label>
                <select id="defaultSelectLoad" class="form-select form-select-sm"
                        aria-label="Small select example"></select>

            </div>
            <div class="w-100"></div>
            <div>
                <div id="selectContainer"></div>
                <button id="add-packing" type="button">Добавить упаковку</button>
                <button id="delete-earlier" type="button">Удалить ранее</button>
                <div class="w-100"></div>
            </div>
            <div class="w-100"></div>
            <div>
                <label>Выберите станцию получения</label>
                <select id="selectStationsInUserRoom" class="form-select form-select-sm"
                        aria-label="Small select example">
                    <!--        Далее идет выбор из выпадающего списка с помощью Process.js-->
                </select>
            </div>
            <div class="w-100"></div>
            <div>
                <button id="price-calculation" type="button">Расчитать стоимость</button>
            </div>
        </div>
        <div class="divCurrentPrice col-8">
            <label id="currentPrice"></label>
            <br>
            <label id="explanations"></label>
            <div id="BlockOfAcceptOrDenyOrder" style="display: none">
                <button id="create-order" type="button">Оформить заказ</button>
                <button id="cancel-order" type="button">Отменить выбор</button>
            </div>
        </div>
    </div>
</div>
<!--блок Main конец-->
<!--footer начало-->
<?php require '../../App/Include/Footer.php' ?>
<!--footer конец-->

</body>

</html>