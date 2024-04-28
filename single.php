<?php require('app/include/partition.php') ?>
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
<?php $header = new Partition(false,true);
$header->show();
?>
<!--блок Main-->
<div class="container">
    <div class="content row ">
        <!--main content-->
        <div class="main-content news-content col-md-9 col-9">
            <h2>Важность разработки сайтов</h2>
            <p>
                Разработка сайтов имеет большое значение в современном мире. Вот несколько ключевых причин, почему
                разработка сайтов является важной:
            </p>
            <ul>
                <li>
                    1. Онлайн присутствие и доступность: Веб-сайт позволяет вашей компании или организации быть
                    доступной в
                    Интернете 24/7. Это дает возможность привлекать новых клиентов, предоставлять информацию о вашей
                    продукции или услугах, а также поддерживать связь с существующими клиентами.
                </li>

                <li>2. Расширение рынка: Веб-сайт позволяет расширить ваш рынок и привлечь клиентов со всего мира. Это
                    особенно важно для компаний, которые хотят масштабировать свой бизнес и достичь новых аудиторий.
                </li>

                <li> 3. Улучшение имиджа и доверия: Профессионально разработанный веб-сайт может улучшить имидж вашей
                    компании и создать доверие у потенциальных клиентов. Качественный дизайн и хорошо структурированная
                    информация помогут убедить посетителей в надежности вашей компании.
                </li>

                <li> 4. Маркетинг и продвижение: Веб-сайт является эффективным инструментом для маркетинга и продвижения
                    вашего бизнеса. Вы можете использовать его для размещения рекламы, проведения акций и сбора
                    контактной
                    информации о посетителях.
                </li>

                <li> 5. Конкурентное преимущество: В настоящее время большинство компаний имеют свои веб-сайты. Если
                    ваша
                    компания не имеет онлайн присутствия, вы можете потерять конкурентное преимущество. Разработка сайта
                    поможет вам оставаться впереди конкурентов и привлекать больше клиентов.
                </li>

                <li> 6. Улучшение обслуживания клиентов: Веб-сайт может быть использован для предоставления
                    дополнительных
                    услуг и улучшения обслуживания клиентов. Например, вы можете предоставить онлайн-чат для ответов на
                    вопросы клиентов или создать раздел с часто задаваемыми вопросами.
                </li>

                <li> 7. Аналитика и отслеживание: Веб-сайт позволяет собирать данные о посетителях, их поведении и
                    предпочтениях. Это помогает вам анализировать эффективность вашего сайта и принимать меры для его
                    улучшения.
                </li>

            </ul>
            <p> В целом, разработка сайтов играет важную роль в современном бизнесе, предоставляя компаниям возможность
                быть
                доступными онлайн, привлекать новых клиентов и улучшать обслуживание существующих клиентов.</p>
        </div>
        <!--sidebar-->
        <div class="sidebar col-md-3 col-3">
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
$footer->show();
?>
<!--footer конец-->

</body>
</html>