<?php
require __DIR__ . '/../Database/DataProcessing.php';
$action = '';
$data = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['button-reg'])) {
    $action = 'registration';
}
if (isset($_POST['button-auth'])) {
    $action = 'authenticate';
}
//хз
if (isset($_POST['post-data-in-lk'])) {
    $action = 'TakeOllDataInUsers';
}
//Загрузка списка всех заказов
if (basename($_SERVER['PHP_SELF']) === 'ManagerRoom.php') {
    $action = 'GetAllOrders';
}
//добавление новых станций
if (isset($_POST['name'])) {
    $action = 'AddStation';
}
//загрузка селектов из бд
if (basename($_SERVER['PHP_SELF']) === 'Cargos.php') {
    $action = "LoadSelects";
}
//создание заказа
if (isset($data['action'])) {
    (new DataProcessing())->CreateOrder($data);
}
switch ($action) {
    case 'registration':
        (new DataProcessing())->registration();
        break;
    case 'authenticate':
        (new DataProcessing())->authenticate();
        break;
    case 'TakeOllDataInUsers':
        (new DataProcessing())->TakeOllDataInUsers();
        break;
    case 'GetAllOrders':
        (new DataProcessing())->GetAllOrders();
        break;
    case 'AddStation':
        (new DataProcessing())->AddStation();
        break;
    case 'LoadSelects':
        (new DataProcessing())->loadSelects();
        break;
    default:
        break;
}
