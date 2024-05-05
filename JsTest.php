<?php
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
    <script src="src/assets/js/test.js"></script>
    <!--    подключение стрилей-->
    <link rel="stylesheet" href="src/assets/css/admh.css">
    <!--    подключение шрифтов от google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php require 'src/App/Include/Header.php' ?>
<!--блок Main-->
<div class="container">
    <div class="row">
        <div class="sidebar col-4">
            <ul>
                <li>
                    <a href="#">Статусы заказов</a>
                </li>
                <li>
                    <a href="#">Пользователи</a>
                </li>
            </ul>
        </div>
        <form method="post" action="ManagerRoom.php">
            <input name="InputTest" class="row col-2" oninput="InputProcess(this)">
                <button id="sdsd" name="post-data-in-lk" class="btn btn-primary " type="button"
                        onclick="document.getElementById('sdsd').innerText= 'sdsd';//comment ssss"
                        value="1">Получить данные
                </button>
                <button type="button" onclick="Press(this);">Нажми на меня</button>
            </div>
            <!--            выводит строку текста-->
            <script>
            </script>
        </form>
    </div>
</div>
<!--блок Main конец-->
<!--footer начало-->
<?php require 'src/App/Include/Footer.php' ?>
<!--footer конец-->
</body>

</html>