<?php require('app/include/partition.php'); ?>
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
<?php $header = new Partition(false,true);
$header->show();
?>
<!--Carousel Начало-->
<div class="container">
    <div>
        <h2 class="slider-title">Добро пожаловать</h2>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-slide="next">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="assets/images/1.jpeg" class="d-block w-100" alt="..." height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Перевозка грузов по морю</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/images/2.jpg" class="d-block w-100" alt="..." height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Дешевое хранение</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="assets/images/3.jpg" class="d-block w-100" alt="..." height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Большой автопарк</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!--Carousel Конец-->

<!--блок Main-->
<div class="container">
    <div class="content row">
        <!--main content-->
        <div class="main-content col-md-9">
            <h2>Новости</h2>
            <div class="post row">
                <div class="img col-4 col-md-4">
                    <img src="assets/images/posts_text.jpg" alt="" class="img-thumbnail border border-5">
                </div>
                <div class="post-text col-8 col-mb-8 border border-5">
                    <h2>
                        <a href="single.php">Важность разработки сайтов</a>
                    </h2>
                    <i class="far fa-user"> Рослый П.М.</i>
                    <i class="far fa-calendar"> Апрель 24</i>
                    <p class="preview-text">
                        Нужен индивидуальный подход к нестандартным задачам – вам недостаточно сервиса, который
                        предоставляют другие компании.
                    </p>
                </div>
            </div>

            <!--            <div class="post row">-->
            <!--                <div class="img col-4 col-md-4">-->
            <!--                    <img src="images/posts_text.jpg" alt="" class="img-thumbnail border border-5">-->
            <!--                </div>-->
            <!--                <div class="post-text col-8 col-mb-8">-->
            <!--                    <h2>-->
            <!--                        <a href="single.html">Название статьи</a>-->
            <!--                    </h2>-->
            <!--                    <i class="far fa-user">Имя автора</i>-->
            <!--                    <i class="far fa-calendar">Апрель 24</i>-->
            <!--                    <p class="preview-text">-->
            <!--                        Нужен индивидуальный подход к нестандартным задачам – вам недостаточно сервиса, который-->
            <!--                        предоставляют другие компании.-->
            <!--                    </p>-->
            <!--                </div>-->
            <!--            </div>-->

        </div>


        <!--sidebar-->
        <div class="sidebar col-md-3">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово">
                </form>
            </div>
            <div class="section categories">
                <h3>Категории</h3>
                <ul>
                    <li><a href="#">Частые вопросы</a></li>
                    <li><a href="#">Количество заказов</a></li>
                    <li><a href="#">Связь с нами</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--блок Main конец-->
<!--footer начало-->
<?php $footer = new Partition(true);
$footer ->show();
?>
<!--footer конец-->

</body>

</html>