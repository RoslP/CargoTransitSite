<?php
require_once '../../App/Database/DataProcessing.php';
require_once '../../App/Call/Call.php';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/src/assets/js/Process.js"></script>
    <!--    подключение стрилей-->
    <link rel="stylesheet" href="../../assets/css/admh.css">
    <!--    подключение шрифтов от google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require 'AdminHeader.php' ?>
<!--блок Main-->
<div class="container">
    <div class="row">
        <div class="sidebar col-2">
            <ul>
                <li>
                    <a href="#" id="ToggleOrders">Статусы заказов</a>
                </li>
                <li>
                    <a href="#" id="ToggleUsers">Пользователи</a>
                </li>
                <li>
                    <a href="#" id="ToggleStations">Управление станциями</a>
                </li>
            </ul>
        </div>
<!--        Далее идет таблица всех заказов менеджера-->
        <div id="IdTableManager" class="TableStructure col-10" style="display: block">
            <div class="table-container col-12">
                <table class="ManagerCargosTable">
                    <thead>
                    <tr class="HeadOfTableCargos col-12">
                        <th class="HeadTableElement col-1">Номер</th>
                        <th class="HeadTableElement col-1">Клиент</th>
                        <th class="HeadTableElement col-1">Стоимость</th>
                        <th class="HeadTableElement col-1">Станция</th>
                        <th class="HeadTableElement col-1">Город</th>
                        <th class="HeadTableElement col-1">Груз</th>
                        <th class="HeadTableElement col-1">Упаковка</th>
                        <th class="HeadTableElement col-1">Вес</th>
                        <th class="HeadTableElement col-2">Cтатус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="CellsContentOfTableCargos col-12">
                        <td class="tableElement" id="LId">1</td>
                        <td class="tableElement" id="LStation"></td>
                        <td class="tableElement" id="LCity"></td>
                        <td class="tableElement" id="LStatus"></td>
                        <td class="tableElement" ><input type="checkbox"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class=" col-12">
                <div class="row RowManagerTableDo">
                    <div class="col-3">
                        <button class="btn btn-success">Заказ выполнен</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-danger" style="margin-left: 20px">Отменить заказ</button>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" value="Введите причину отмены">
                    </div>
                </div>
            </div>
        </div>
<!--        Далее идет форма станций менеджера-->
        <div id="IdFormStationsManager" class="TableStructure col-10" style="display: none">
            <div class="table-container col-12">
                <form name="AddStationForm" class="AddStationForm" method="post" action="ManagerRoom.php">
                    <label>Название станции</label>
                    <input name="name" placeholder="Введите название станции" required>
                    <input name="city" placeholder="Введите город станции" required>
                    <button  type="submit">Добавить станцию</button>
                </form>
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