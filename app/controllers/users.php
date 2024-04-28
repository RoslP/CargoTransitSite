<?php
require('app/database/database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {}
$dbmethods = new Database();
if (isset($_POST['button-reg'])) {
    $name = $_POST['Name'];
    $second_name = $_POST['Second_name'];
    $patronymic = $_POST['Patronymic'];
    $login = $_POST['Login'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $company = $_POST['Company'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $CurrentRank = $_POST['IsManagerOrCustomer'];

    $post_data = [
        'is_manager' => $CurrentRank,
        'first_name' => $name,
        'second_name' => $second_name,
        'patronymic' => $patronymic,
        'address' => $address,
        'phone_number' => $phone,
        'company' => $company,
        'login' => $login,
        'password' => $password
    ];


//    $dbmethods->tt($post_data);
//    $id = $dbmethods->insertIntoTable('users', $post_data);
//    echo $id;
//    $lastRow = $dbmethods->selectOne('users', $id);
//    $dbmethods->tt($lastRow);
}

