<?php
session_start();

class Connect {
    private static $pdo;




    public static function getConnection()
    {
        $host = 'db'; // это имя сервиса контейнера MySQL в вашем docker-compose.yml
        $dbname = 'cargo_transit_db';
        $username = 'root';
        $password = 'root';

        try {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Дальнейшие операции с базой данных
        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных: " . $e->getMessage();
        }

        return self::$pdo;
    }
}

