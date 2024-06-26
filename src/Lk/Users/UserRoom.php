<?php
require '../../App/Call/Call.php'
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
    <script src="/src/assets/js/UserProcessing.js" ></script>
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

    <div class="UserLlStructure row">
        <div class="UserData col-3">

        </div>

        <div class="col-9">
            <h3 class="userTableHeader">Заказы пользователя</h3>
            <table class="UserCargosTable">
                <thead class="ManagerCargosTable">
                <tr>
                    <th class="HeadTableElement col-1">Номер</th>
                    <th class="HeadTableElement col-1">Груз</th>
                    <th class="HeadTableElement col-1">Вес Груза</th>
                    <th class="HeadTableElement col-1">Упаковка</th>
                    <th class="HeadTableElement col-1">Цена</th>
                    <th class="HeadTableElement col-1">Станция</th>
                    <th class="HeadTableElement col-1">Город</th>
                    <th class="HeadTableElement col-2">Статус</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!--блок Main конец-->
<!--footer начало-->
<?php require '../../App/Include/Footer.php' ?>
<!--footer конец-->

</body>

</html>