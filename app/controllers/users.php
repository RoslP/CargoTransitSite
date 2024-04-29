<?php
require('app/database/database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
} else
    echo 'GET';

//echo $_SERVER['SERVER_PROTOCOL'];


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

    private function DataPostMethod(): void
    {
        $dbmethods = new Database();
        if (isset($_POST['button-reg'])) {
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
                self::$arrOfPostsend['name'] = $name;
                self::$arrOfPostsend['second_name'] = $second_name;
                self::$arrOfPostsend['patronymic'] = $patronymic;
                self::$arrOfPostsend['company'] = $company;
                self::$arrOfPostsend['address'] = $address;
                self::$arrOfPostsend['phone'] = $phone;
            } elseif (mb_strlen($login) < 3) {
                self::$ErrIfStingEmpty = 'логин должен быть длинее 3-х символов';
                self::$arrOfPostsend['name'] = $name;
                self::$arrOfPostsend['second_name'] = $second_name;
                self::$arrOfPostsend['patronymic'] = $patronymic;
                self::$arrOfPostsend['company'] = $company;
                self::$arrOfPostsend['address'] = $address;
                self::$arrOfPostsend['phone'] = $phone;
            } elseif (!empty($sql = (new Database())->selectOne('users', 'login', $login)) || !empty($sql2 = (new Database())->selectOne('users', 'phone_number', $phone))) {

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
                }
                //берем id пользователся в запросе. Запрос все равно будет выполнен. Мы используем метод lastInsertId() в метода insertIntoTable()
                $id = (new Database())->insertIntoTable('users', $this->post_data);
                //далее выбираем строку по ранее полученному id и присваеваем ее значение в $user
                $user = (new Database())->selectOne('users', 'id_users', $id);
                //Использую массив данных из сессии и назначаю ему ключ-значение id - текущий записанный пользователь
                $_SESSION['id_users'] = $user['id_users'];
                $_SESSION['login'] = $user['login'];
                $_SESSION['is_manager'] = $user['is_manager'];
                if ($_SESSION['is_manager']) {
                    header('location: ' . '/app/ManagerRoom/OrdersStatus.php');
                }
                //перенаправляет пользователя на главную страницу после регистрации
                else {
                    header('location: ' . '/index.php');
                        }
            }
        }
    }


    function registration(): void
    {
        $this->DataPostMethod();
    }

}

//    $dbmethods->tt($post_data);
//    $id = $dbmethods->insertIntoTable('users', $post_data);
//    echo $id;
//    $lastRow = $dbmethods->selectOne('users', $id);
//    $dbmethods->tt($lastRow);