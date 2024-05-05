<?php
$action = '';

if (isset($_POST['button-reg'])) {
    $action = 'registration';
}
if (isset($_POST['button-auth'])) {
    $action = 'authenticate';
}
if (isset($_POST['post-data-in-lk'])) {
    $action = 'TakeOllDataInUsers';
}
if (basename($_SERVER['PHP_SELF']) === 'ManagerRoom.php') {
    $action = 'GetAllStations';
}
if (isset($_POST['name'])) {
    $action = 'AddStation';
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
    case 'GetAllStations':
        (new DataProcessing())->GetAllOrders();
        break;
    case 'AddStation':
        (new DataProcessing())->AddStation();
        break;
    default:
        break;
}
