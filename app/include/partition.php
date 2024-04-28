<?php

class Partition
{
    private $footer;
    private $header;

    public function __construct($footer = false, $header = false)
    {
        if ($header) {
            $this->header = <<<HTML
<header class="container-fluid">
    <!--добавляет обычный контейнер внутри контейнера на всю длину в виде блока div-->
    <div class="container">
        <!--блок row представляет сетку из 12-ти колонок, в них можно размещать колонки с помощью класса col-->
        <div class="row">
            <!--сетка в bootstrap делится на 12 колонок, col-4 означает, что данный блок будет занимать 1/3 всей сетки блока row-->
            <div class="col-4">
                <h1><a href="index.php">TransitCompany</a></h1>
            </div>
            <nav class="col-8">
                <!--                использование иконок в i из font awesome-->
                <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>Главная</a></li>
                    <li><a href="#"><i class="fa-solid fa-truck"></i>Заказы</a></li>
                    <li><i class="fa-solid fa-circle-user"></i>Личный кабинет
                        <ul id="LK">
                            <li><a href="authenticate.php">Войти</a></li>
                            <li><a href="reg.php">Зарегистрироваться</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
HTML;
        }

        if ($footer) {
            $this->footer = <<<HTML
<footer class="footer container-fluid">
    <div class="footer-content container">
        <div class="row">
            <div class="footer-section about col-md-4 col-4">
                <h3 class="logo-text">TransitCompany</h3>
                <p>Наша компания по грузоперевозкам занимает лидиреющие
                    позиции на дальнем востоке.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone">&nbsp; +79247771700</i></span>
                    <span><i class="fas fa-envelope"></i>&nbsp;@transit.company</span>
                </div>
                <div class="socials229">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section links col-mb4 col-4">
                <h3>Полезные ссылки</h3>
                <ul>
                    <li><a href="#">События</a></li>
                    <li><a href="#">Команда</a></li>
                    <li><a href="#">Галлерея</a></li>
                </ul>
            </div>
            <div class="footer-section contact-form col-mb-4 col-4">
                <form action="index.html" method="post">
                    <input type="email" name="email" class="text-input contact-input"
                           placeholder="You email address...">
                    <textarea rows="4" name="message" class="text-input contact-input"
                              placeholder="You message"></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope">Отправить</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; Pavel Ros | 214.42
        </div>
    </div>
</footer>
HTML;
        }
    }

    public function show()
    {
        echo $this->footer;
        echo $this->header;
    }
}

