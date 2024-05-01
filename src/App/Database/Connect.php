<?php
session_start();
//PDO::ATTR_ERRMODE  PDO - является классом. ATTR_ERRMODE - статическим полем класса
//Символ :: используется для обращения к статическому свойству или методу класса без
// необходимости создавать экземпляр этого класса
//=> используется для установки значения свойства в ассоциативном массиве
//Таким образом, в данном коде устанавливается режим обработки ошибок для объекта PDO. PDO::ATTR_ERRMODE указывает
//на свойство, которое определяет режим обработки ошибок, а PDO::ERRMODE_EXCEPTION указывает на значение, которое
//устанавливает режим обработки ошибок на исключения типа PDOException

//Для доступа к статическому полю класса используется синтаксис ClassName::fieldName

class Connect {
    private static $pdo;

    static protected $dsnData = [
        'host' => 'localhost',
        'dbname' => 'cargo_transit_db',
        'charset' => 'utf8',
        'user' => 'root',
        'passwd' => 'mysql',
    ];
    public static function getConnection()
    {
        if (self::$pdo === null) {
            $dsn = "mysql:host=".self::$dsnData['host'].";dbname=".self::$dsnData['dbname'].";charset=".self::$dsnData['charset'];
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            try {
                self::$pdo = new PDO($dsn, self::$dsnData['user'], self::$dsnData['passwd'], $options);
            } catch (PDOException $e) {
                die("Ошибка подключения: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
