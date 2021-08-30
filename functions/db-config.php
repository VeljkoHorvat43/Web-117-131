<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "food";
$port = 3306;

try{
    $dsn = 'mysql:host=' .$host . ';port=' . $port . ';dbname=' . $dbname. ';charset=utf8';
    $pdo = new PDO($dsn, $user, $pass);
}
catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
