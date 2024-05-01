<?php require 'Connect.php';
class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connect::getConnection();
    }

    public function tt($tableName)
    {
        echo '<pre>';
        print_r($tableName);
        echo '</pre>';
    }

    //Проверка выполнения запроса к бд    $this->dbErrorInfo($query);
    public function dbErrorInfo($query)
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] != PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
    }

    public function selectFrom(): void
    {
        // Запрос к базе данных
        $sql = "SELECT * FROM Users";
        $result = $this->pdo->query($sql);

// Преобразование результата в формат JSON
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
        $jsonData = json_encode($users);
// Запись данных в файл data.json
        $file = '../../assets/json/request.json';
        file_put_contents($file, $jsonData);
    }

    public function selectPassword($tableName, $login)
    {
        $sql = "SELECT password FROM $tableName WHERE login = :login";
        $query = $this->pdo->prepare($sql);
        $query->execute([':login' => $login]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            //здесь я использую {} для того что бы указать php что это сложное выражение типа массив и нужно его интерпритировать в строку
            //в дальнейшем я использую эту строку в DataProcessing при аутентификации пользователя, в верификации пароля из базы данных.
            return "{$result['password']}";
        } else {
            return null; // или что-то другое, в зависимости от вашей логики
        }
    }

    public function selectFromWhereAnd($tableName, $params = [])
    {
        $whereClause = '';
        $firstparam = true;
        $paramsIsNotEmpty = false;
        //обработка массива $params
        foreach ($params as $key => $value) {
            //Если $значение ассоциативного массива ключ=$значение не пустое
            if (!empty(trim($value))) {
                //если первый параметр то AND в начало строки не добавляется
                if (!$firstparam) {
                    $whereClause .= ' AND ';
                }
                $whereClause .= "$key = ?";
                $bindings[] = $value;
                $firstparam = false;
                $paramsIsNotEmpty = true;
            }
        }
        //Проверка если хотя-бы один параметр был присвоен массиву
        if ($paramsIsNotEmpty) {
            $sql = "SELECT * FROM $tableName WHERE $whereClause";
            $query = $this->pdo->prepare($sql);
            $query->execute($bindings);
            $errInfo = $query->errorInfo();
            if ($errInfo[0] != PDO::ERR_NONE) {
                echo $errInfo[2];
                exit();
            }
            //возвращаю строку запроса в виде ассоциативногомассива и присваиваю значения для сессии
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_users'] = $result['id_users'];
            $_SESSION['login'] = $result['login'];
            $_SESSION['is_manager'] = $result['is_manager'];
            return $result;
        } //Если все параметры массива пустые
        else {
            return "";
        }
    }

    public function selectOne($tableName, $col, $id)
    {
        $allowedTables = ['cargo', 'stations', 'Users'];
        if (!in_array($tableName, $allowedTables)) {
            die("Неверное имя таблицы");
        } else {
            $sql = "SELECT * FROM $tableName WHERE $col = '$id'";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $this->dbErrorInfo($query);
            return $query->fetch();
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
        $query->execute();
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
        //UPDATE `Users` SET `patronymic` = 'Sanrinosd', `address` = 'New Yorkf', `company` = 'Googles' WHERE `Users`.`id_users` = 9;
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
