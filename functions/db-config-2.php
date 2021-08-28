<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "food";
function db () {
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "food";
    static $conn;
    if ($conn===NULL){
        $conn = mysqli_connect($host, $user, $pass, $dbname, 3306);
    }
    return $conn;
}
$conn = mysqli_connect($host, $user, $pass, $dbname, 3306);
