<?php require 'Connect.php';

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connect::getConnection();
    }

    //Проверка выполнения запроса к бд    $this->dbErrorInfo($query);
    public function dbErrorInfo($query): void
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] != PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
    }

    public function OrdersToCurrentUser()
    {
        $id = $_SESSION['id_users'];
        $sql = "SELECT orders.order_id, cargo.cargo_name AS cargo_name, cargo.weight AS cargo_weight,
       orders.packing AS packing, orders.price AS total_price, stations.name AS station_name, stations.city AS station_city, orders.status AS status FROM orders
           INNER JOIN users ON orders.id_users = users.id_users INNER JOIN cargo ON orders.cargo_id = cargo.cargo_id INNER JOIN stations ON orders.station_id = stations.station_id
           WHERE orders.id_users = $id ORDER BY orders.order_id DESC";
        $query = $this->pdo->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($data);
        $file = "../../assets/json/ordersToCurrentUser.json";
        file_put_contents($file, $json);

    }

    public function selectFrom($tableName, $currentUser = 0,$params=''): void
    {
        $allowedTables = ['cargo', 'orders', 'stations', 'users', 'packaging'];
        if (!in_array($tableName, $allowedTables)) {
            die('неверное имя таблицы');
        }

        if ($currentUser != 0 && $params!=='') {
            $parseToInt = intval($currentUser);
            $sql = "SELECT * FROM $tableName WHERE $params = $parseToInt";
            $query = $this->pdo->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $jsonData = json_encode($data);
            $file = "../../assets/json/$tableName.json";
            file_put_contents($file, $jsonData);
        } else {
            $sql = "SELECT * FROM $tableName";
            $query = $this->pdo->query($sql);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            // Преобразование результата в формат JSON
            $jsonData = json_encode($data);
            $file = "../../assets/json/$tableName.json";
            file_put_contents($file, $jsonData);
        }
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
            if($result)
            {
                $_SESSION['id_users'] = $result['id_users'];
                $_SESSION['login'] = $result['login'];
                $_SESSION['is_manager'] = $result['is_manager'];
                $_SESSION['name']=$result['first_name'];
            }
            return $result;
        } //Если все параметры массива пустые
        else {
            return "";
        }
    }

    public function selectOne($tableName, $col, $id)
    {
        $allowedTables = ['cargo', 'stations', 'users'];
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

    public function insertIntoTable($tableName, $data): int
    {
        $i = 0;
        $coll = '';
        $masks = '';
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                if ($i === 0) {
                    $coll = $coll . "$key";
                    $masks = $masks . "'" . "$value" . "'";
                } else {
                    $coll = $coll . ", $key";
                    $masks = $masks . ", '$value" . "'";
                }
                $i++;
            } else {
                if ($i === 0) {
                    $coll = $coll . "$key";
                    $masks = $masks . $value;
                } else {
                    $coll = $coll . ", $key";
                    $masks = $masks . ", " . $value;
                }
                $i++;
            }
        }
        $sql = " INSERT INTO $tableName ($coll) VALUES ($masks)";
        $query = $this->pdo->prepare($sql);
        //Для выполнения подготовленного запроса передаем параметры в виде ассоциативного массива в строку выполнения
        $query->execute();
        //возвращает последний id, записанный в базу данных
        return $this->pdo->lastInsertId();
    }


    public function GetAllOrders(): void
    {

        $sql = "SELECT orders.order_id,users.first_name AS user_name, cargo.cargo_name AS cargo_name, cargo.weight AS cargo_weight,
       orders.packing AS packing, orders.price AS total_price, stations.name AS station_name, stations.city AS station_city, orders.status AS status FROM orders
           INNER JOIN users ON orders.id_users = users.id_users INNER JOIN cargo ON orders.cargo_id = cargo.cargo_id INNER JOIN stations ON orders.station_id = stations.station_id
ORDER BY orders.order_id ASC";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $jsonData = json_encode($data);
        $file = "../../assets/json/order.json";
        file_put_contents($file, $jsonData);

    }

    public function CreateOrder($data): void
    {
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[$key] = $value;
        }

        //Подготовка к инсерту в грузы
        $cargoData = [
            'cargo_name' => $newData['cargoNamevalue'] ?? null,
            'weight' => $newData['cargoWeightvalue'] ?? null,
        ];
        $lastCargoId = $this->insertIntoTable('cargo', $cargoData);

        $stringOfPacking = '';
        $firstGo = true;
        //Подготовка к инсерту в заказы
        foreach ($newData as $key => $value) {
            if (preg_match("/^Select\d.*name$/", $key)) {
                if (!$firstGo) {
                    $stringOfPacking .= ", {$value}";
                } else {
                    $stringOfPacking .= "{$value}";
                    $firstGo = false;
                }
            }
        }

        $insertOrderData = [
            'id_users' => intval($_SESSION['id_users']),
            'cargo_id' => intval($lastCargoId),
            'station_id' => intval($newData['StationId'] ?? null),
            'packing' => $stringOfPacking,
            'price' => $newData['price'] ?? null,
            'status' => 'Заказ обрабатывается'
        ];
        $this->insertIntoTable('orders',$insertOrderData);
    }

    public function CancelOrder($data): void
    {
        $keys = '';
        $isFirst = true;
        foreach ($data as $key => $value) {
            if ($isFirst) {
                $keys .= $key;
                $isFirst = false;
            } else {
                $keys .= ', ' . $key;
            }

        }

        $sql = "UPDATE orders SET status = 'Заказ отменён' WHERE order_id IN ($keys)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }

    public function CompleteOrder($data): void
    {
        $keys = '';
        $isFirst = true;
        foreach ($data as $key => $value) {
            if ($isFirst) {
                $keys .= $key;
                $isFirst = false;
            } else {
                $keys .= ', ' . $key;
            }

        }

        $sql = "UPDATE orders SET status = 'Заказ выполнен' WHERE order_id IN ($keys)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }
}

