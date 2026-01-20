<?php
session_start();  // Запускаем сессию на всех страницах

$host = 'localhost';
$db   = 'ck261205_itcube';  
$user = 'ck261205_itcube';       
$pass = '4akAMqFD';           
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Подключение к БД не удалось: ' . $e->getMessage());
}
?>