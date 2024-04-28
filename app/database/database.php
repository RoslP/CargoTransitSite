<?php
require_once "connect.php";

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::getConnection();
    }

    public function tt($tableName)
    {
        echo '<pre>';
        print_r($tableName);
        echo '</pre>';
    }

    //Проверка выполнения запроса к бд
    public function dbErrorInfo($query)
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] != PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
    }

    public function selectFrom($tableName, $params = [])
    {
        $allowedTables = ['cargo', 'stations', 'users'];
        if (!in_array($tableName, $allowedTables)) {
            die("Недопустимое имя таблицы : $tableName");
        }
        $sql = "SELECT * FROM $tableName";
        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $value) {
                if (!is_numeric($key)) {
                    $value = "'" . $value . "'";
                }
                if ($i === 0) {
                    $sql = $sql . " WHERE $key = $value";
                } else {
                    $sql = $sql . " AND $key = $value";
                }
                $i++;
            }
        }
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $this->dbErrorInfo($query);
        $data = $query->fetchAll();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }


    public function selectOne($tableName, $id)
    {
        $allowedTables = ['cargo', 'stations', 'users'];
        if (!in_array($tableName, $allowedTables)) {
            die("Неверное имя таблицы");
        } else {
            $sql = "SELECT * FROM $tableName WHERE id_users = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $this->dbErrorInfo($query);
            return $query->fetchAll();
        }
    }

    public function insertIntoTable($tableName, $data)
    {
        $i = 0;
        $coll = '';
        $masks = '';
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $coll = $coll . "$key";
                $masks = $masks . "'" . "$value" . "'";
            } else {
                $coll = $coll . ", $key";
                $masks = $masks . ", '$value" . "'";
            }
            $i++;
        }
        $sql = " INSERT INTO $tableName ($coll) VALUES ($masks)";
        $query = $this->pdo->prepare($sql);
        //Для выполнения подготовленного запроса передаем параметры в виде ассоциативного массива в строку выполнения
        $query->execute($data);
        $this->dbErrorInfo($query);
        //возвращает последний id, записанный в базу данных
        return $this->pdo->lastInsertId();
    }

    public function updateTable($tableName, $data, $id)
    {
        $i = 0;
        $str = '';
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $str = $str . "$key = '$value'";
            } else {
                $str = $str . ", $key = '$value'";
            }
            $i++;
        }
        //UPDATE `users` SET `patronymic` = 'Sanrinosd', `address` = 'New Yorkf', `company` = 'Googles' WHERE `users`.`id_users` = 9;
        $sql = "UPDATE $tableName SET $str WHERE id_users = $id";
//        $this->tt($sql);
//        exit();
        $query = $this->pdo->prepare($sql);
        //Для выполнения подготовленного запроса передаем параметры в виде ассоциативного массива в строку выполнения
        $query->execute($data);
        $this->dbErrorInfo($query);
    }

    public function deleteFromTable($tableName, $id)
    {

        $sql = "DELETE FROM $tableName WHERE id_users = $id";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $this->dbErrorInfo($query);
    }

}

$arrData = [
    'is_manager' => '1',
    'first_name' => 'Juliana',
    'second_name' => 'SamS',
    'patronymic' => 'SamF',
    'address' => 'Oliaska',
    'phone_number' => '6123006789',
    'company' => 'BigCompany',
    'login' => 'jill',
    'password' => '123456'

];

$params = [
    'is_manager' => 0,
    'first_name' => 'ААА'
];

//$database = new Database();
//$database->selectFrom("users", $params);
//$database->insertIntoTable("users", $arrData);
//$database->updateTable("users", $arrData, 6);
//$database->deleteFromTable('users',10);
