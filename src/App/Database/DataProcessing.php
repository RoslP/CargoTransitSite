<?php
require 'Database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
} else
    echo 'GET';

class DataProcessing
{
    static public $ErrIfStingEmpty = '';
    public static $arrOfPostsend = [
        'name' => '',
        'second_name' => '',
        'patronymic' => '',
        'company' => '',
        'address' => '',
        'phone' => '',
    ];

    private array $post_data = [
        'is_manager' => '',
        'first_name' => '',
        'second_name' => '',
        'patronymic' => '',
        'address' => '',
        'phone_number' => '',
        'company' => '',
        'login' => '',
        'password' => '',];

    private function DataPostMethodReg(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
            //trim - "отделка" Функция trim удаляет пробелы полученные из формы в случае если пользователь (после/или до) ввода данных нажал пробел
            $name = trim($_POST['Name']);
            $second_name = trim($_POST['Second_name']);
            $patronymic = trim($_POST['Patronymic']);
            $login = trim($_POST['Login']);
            $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
            $company = trim($_POST['Company']);
            $address = trim($_POST['Address']);
            $phone = trim($_POST['Phone']);
            $CurrentRank = $_POST['IsManagerOrCustomer'];
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
            if ($name === '' || $second_name === '' || $patronymic === '' || $login === '' || $password === '' || $company === '' || $address === '' || $phone === '' || $CurrentRank === '') {
                self::$ErrIfStingEmpty = 'Не все поля заполнены';
            } elseif (mb_strlen($login) < 3) {
                self::$ErrIfStingEmpty = 'логин должен быть длинее 3-х символов';
                self::$arrOfPostsend['name'] = $name;
                self::$arrOfPostsend['second_name'] = $second_name;
                self::$arrOfPostsend['patronymic'] = $patronymic;
                self::$arrOfPostsend['company'] = $company;
                self::$arrOfPostsend['address'] = $address;
                self::$arrOfPostsend['phone'] = $phone;
            } elseif (!empty($sql = (new Database())->selectOne('Users', 'login', $login)) || !empty($sql2 = (new Database())->selectOne('Users', 'phone_number', $phone))) {

                if (!empty($sql)) {
                    $row = $sql;
                    if ($row['login'] === $login) {
                        self::$ErrIfStingEmpty = 'Пользователь с таким логином уже зарегистрирован';
                    }
                }
                if (!empty($sql2)) {
                    $row2 = $sql2;
                    if ($row2['phone_number'] === $phone) {
                        self::$ErrIfStingEmpty = 'Данный номер уже используется';
                    }
                }
            } else {
                $this->post_data['is_manager'] = $CurrentRank;
                $this->post_data['first_name'] = $name;
                $this->post_data['second_name'] = $second_name;
                $this->post_data['patronymic'] = $patronymic;
                $this->post_data['address'] = $address;
                $this->post_data['phone_number'] = $phone;
                $this->post_data['company'] = $company;
                $this->post_data['login'] = $login;
                $this->post_data['password'] = $password;

                //устанавливаем пустыую строку ошибки ввода данных в форму
                self::$ErrIfStingEmpty = "Регистрация пользователя $login прошла успешно";
                //устанавливаем пустые значения при успешной отправки формы в ее поля
                foreach (self::$arrOfPostsend as $key => &$value) {
                    $value = '';
                    //берем id пользователся в запросе. Запрос все равно будет выполнен. Мы используем метод lastInsertId() в метода insertIntoTable()
                    $id = (new Database())->insertIntoTable('Users', $this->post_data);
                    //далее выбираем строку по ранее полученному id и присваеваем ее значение в $user
                    $user = (new Database())->selectOne('Users', 'id_users', $id);
                    //Использую массив данных из сессии и назначаю ему ключ-значение id - текущий записанный пользователь
                    $_SESSION['id_users'] = $user['id_users'];
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['is_manager'] = $user['is_manager'];
                    if ($_SESSION['is_manager']) {
                        header('location: ' . '/Lk/Admin/ManagerRoom.php');
                    } //перенаправляет пользователя на главную страницу после регистрации
                    else {
                        header('location: ' . '/Index.php');
                    }
                }
            }
        }
    }

    private function DataPostMethodAuth(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])) {
            $all_post_data = [];
            $dbpasswod = '';
            foreach ($_POST as $key => $value) {
                if ($key === 'password') {
                    $dbpasswod .= (new Database())->selectPassword('Users', trim($_POST['login']));
                    if (password_verify($value, $dbpasswod)) {
                        $all_post_data[$key] = $dbpasswod;
                    }
                } else {
                    $all_post_data[$key] = trim($value);
                }
            }
            $login = $_POST['login'];
            $password = $_POST['password'];
            if ($login === '' || $password === '') {
                self::$ErrIfStingEmpty = 'Не все поля заполнены';
            } elseif (!empty((new Database())->selectFromWhereAnd('Users', $all_post_data))) {
                if ($_SESSION['is_manager'] === '0') {
                    header('location:' . '/Index.php');
                }
                else
                    header('location:' . '/src/Lk/Admin/ManagerRoom.php');
            } else {
                self::$ErrIfStingEmpty = 'Неверное имя пользователи или пароль';
            }
        }
    }

    private function AddNewStation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $postData = [];
            foreach ($_POST as $key => $value) {
                $postData[$key] = trim($value);
            }
            (new Database())->insertIntoTable('stations',$postData);
            header("Location: ManagerRoom.php");
            exit;
        }
    }


    function registration(): void
    {
        $this->DataPostMethodReg();
    }

    function authenticate(): void
    {
        $this->DataPostMethodAuth();
    }
    //хз что за функция записывает всех пользователей
    function TakeOllDataInUsers(): void
    {
        (new Database())->selectFrom();
    }
    //Вывод загрузка всех заказов для менеджера с дальнейшей записью в order и request.json файлы
    function GetAllOrders(): void
    {
       (new Database())->GetAllFromTable('orders');
    }
    //Добавление станции менеджером
    function AddStation(): void
    {
        $this->AddNewStation();
    }
    //загрузка списка станций пользователю
    function loadStation(): void
    {
        (new Database())->selectFrom('stations');
        (new Database())->selectFrom('packaging');
    }
}
