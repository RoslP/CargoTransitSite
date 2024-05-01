<?php
session_start();
?>
<header class="container-fluid">
    <!--добавляет обычный контейнер внутри контейнера на всю длину в виде блока div-->
    <div class="container">
        <!--блок row представляет сетку из 12-ти колонок, в них можно размещать колонки с помощью класса col-->
        <div class="row">
            <!--сетка в bootstrap делится на 12 колонок, col-4 означает, что данный блок будет занимать 1/3 всей сетки блока row-->
            <div class="col-4">
                <h1><a href="/Index.php">TransitCompany</a></h1>
            </div>
            <nav class="col-8">
                <!--                использование иконок в i из font awesome-->
                <ul>
                    <li><a href="/Index.php"><i class="fa-solid fa-house"></i>Главная</a></li>
                    <li><a href="/src/Lk/Cargos/Cargos.php"><i class="fa-solid fa-truck"></i>Заказы</a></li>
                    <li>
                        <!--                        ветвление первое условие входа-->
                            <i class="fa-solid fa-circle-user"></i>
                            <?php echo $_SESSION['login']; ?>
                            <ul id="LK">
                                <li><a href="/src/Lk/Users/UserRoom.php">Личный кабинет</a></li>
                                <li><a href='/src/Pages/Sd.php'>Выход</a></li>
                            </ul>
                            <?php if ($_SESSION['is_manager']) : ?>
                                <ul id="LK">
                                    <!--                                     <li><a href="UserRoom.php">Статусы заказов</a></li>-->
                                    <li><a href="/src/Lk/Admin/ManagerRoom.php">Управление заказами</a></li>
                                    <li><a href="/src/Pages/Sd.php">Выход</a></li>
                                </ul>
                            <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>