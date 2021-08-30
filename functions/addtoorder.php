<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
include "db-config.php";
$sql = "SELECT * FROM orders where id_user = :id and delivered=0";
$stat = $pdo->prepare($sql);
$stat->bindParam(':id', $_GET['user'], PDO::PARAM_STR);
$stat->execute();
$res = $stat->fetch();
if($res!=null){
  $sql3 = "SELECT * FROM order_food,orders where order_food.idFood = ? and order_food.idOrder=? and orders.delivered=0 and order_food.idOrder=orders.idOrder ";
  $stat = $pdo->prepare($sql3);
  $stat->bindParam(1, $_GET['foodid'], PDO::PARAM_STR);
      $stat->bindParam(2, $res['idOrder'], PDO::PARAM_STR);
  $stat->execute();
  print_r($stat->errorInfo());
  $res2 = $stat->fetch();
  var_dump($res2);
  if($res2!=null){
    $sql4 = "UPDATE `order_food` SET `amount`=(select amount from order_food where idFood=? and idOrder=? )+? WHERE idFood = ? and idOrder=? and (select delivered from orders where idOrder=? )=0 and idOrder=(select idOrder from orders where idOrder=? ) ";
    $stat = $pdo->prepare($sql4);
    $stat->bindParam(1, $_GET['foodid'], PDO::PARAM_STR);
    $stat->bindParam(2, $res['idOrder'], PDO::PARAM_STR);
    $stat->bindParam(3, $_POST['count'], PDO::PARAM_STR);
      $stat->bindParam(4, $_GET['foodid'], PDO::PARAM_STR);
        $stat->bindParam(5, $res['idOrder'], PDO::PARAM_STR);
        $stat->bindParam(6, $res['idOrder'], PDO::PARAM_STR);
        $stat->bindParam(7, $res['idOrder'], PDO::PARAM_STR);
    $stat->execute();
    print_r($stat->errorInfo());
  }
  else{
  $sql2 = "INSERT into order_food values (?,?,?)";
  $stat = $pdo->prepare($sql2);
  $stat->bindParam(1, $res['idOrder'], PDO::PARAM_STR);
  $stat->bindParam(2, $_GET['foodid'], PDO::PARAM_STR);
  $stat->bindParam(3, $_POST['count'], PDO::PARAM_INT);
  $stat->execute();
  print_r($stat->errorInfo());
}
}
else {
  $sql3 = "INSERT into orders values (null,CURDATE(),0,?)";
  $stat = $pdo->prepare($sql3);
  $stat->bindParam(1, $_GET['user'], PDO::PARAM_STR);
  $stat->execute();
  print_r($stat->errorInfo());

  $sql = "SELECT * FROM orders where id_user = :id and delivered=0";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(':id', $_GET['user'], PDO::PARAM_STR);
  $stat->execute();
  print_r($stat->errorInfo());
  $res = $stat->fetch();

  $sql2 = "INSERT into order_food values (?,?,?)";
  $stat = $pdo->prepare($sql2);
  $stat->bindParam(1, $res['idOrder'], PDO::PARAM_STR);
  $stat->bindParam(2, $_GET['foodid'], PDO::PARAM_STR);
  $stat->bindParam(3, $_POST['count'], PDO::PARAM_INT);
  $stat->execute();
  print_r($stat->errorInfo());

}
echo $_POST['count'];
var_dump($_SESSION['url']);
if($_SESSION['url'] =='http://localhost/webprojekat/user.php'){
  header("Location: ../user.php");
}
else{
header("Location: ../cenovnik.php");
}
 ?>
