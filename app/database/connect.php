<?php
$driver = 'mysql';
$db_host = 'localhost';
$db_name = 'cargo_transit_db';
$db_user = 'root';
$db_password = 'mysql';
$charset = 'utf8';

//PDO::ATTR_ERRMODE  PDO - является классом. ATTR_ERRMODE - статическим полем класса
//Символ :: используется для обращения к статическому свойству или методу класса без
// необходимости создавать экземпляр этого класса
//=> используется для установки значения свойства в ассоциативном массиве
//Таким образом, в данном коде устанавливается режим обработки ошибок для объекта PDO. PDO::ATTR_ERRMODE указывает
//на свойство, которое определяет режим обработки ошибок, а PDO::ERRMODE_EXCEPTION указывает на значение, которое
//устанавливает режим обработки ошибок на исключения типа PDOException

//Для доступа к статическому полю класса используется синтаксис ClassName::fieldName
try {
    $pdo = new PDO ('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
