<?php
?>
<header class="container-fluid">
    <!--добавляет обычный контейнер внутри контейнера на всю длину в виде блока div-->
    <div class="container">
        <!--блок row представляет сетку из 12-ти колонок, в них можно размещать колонки с помощью класса col-->
        <div class="row">
            <!--сетка в bootstrap делится на 12 колонок, col-4 означает, что данный блок будет занимать 1/3 всей сетки блока row-->
            <div class="col-4">
                <h1><a href="/index.php">TransitCompany</a></h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="/index.php"><i class="fa-solid fa-house"></i>Главная</a></li>
                    <?php if (!$_SESSION['is_manager']) : ?>
                        <li><a href="/src/Lk/Cargos/Cargos.php"><i class="fa-solid fa-truck"></i>Заказы</a></li>
                    <?php else : ?>
                        <li><a href="/src/Lk/Admin/ManagerRoom.php"><i class="fa-solid fa-truck"></i>Управление заказами</a></li>
                    <?php endif; ?>
                    <li>
                        <i class="fa-solid fa-circle-user"></i>
                        <?php echo $_SESSION['name']; ?>
                        <ul id="LK">
                            <li><a href="/src/Lk/Users/UserRoom.php">Личный кабинет</a></li>
                            <li><a href='/src/Pages/Sd.php'>Выход</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>