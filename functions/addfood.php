<?php
include "../header.php";
if(!isset($_SESSION['admin'])){
  header('Location:../index.php');
}
include "db-config.php";
include "geturl.php";
var_dump($_POST);
var_dump($_FILES);

$name = $_FILES['food_image']['name'];
 $target_dir = "../img/";
 $target_file = $target_dir . basename($_FILES["food_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($imageFileType,$extensions_arr) ){
    // Upload file
    if(move_uploaded_file($_FILES['food_image']['tmp_name'],$target_dir.$name)){
       // Insert record
       $namefull='img/'.$name;
       $sql = "INSERT into food values (null,?,?,?,?,?)";
       $stat = $pdo->prepare($sql);
       $stat->bindParam(1, $_POST['food_name'], PDO::PARAM_STR);
       $stat->bindParam(2, $_POST['food_desc'], PDO::PARAM_STR);
       $stat->bindParam(3, $_POST['food_price'], PDO::PARAM_STR);
       $stat->bindParam(4, $namefull, PDO::PARAM_STR);
       $stat->bindParam(5, $_POST['food_category'], PDO::PARAM_STR);
       $stat->execute();
       //$res = $stat->fetchAll();

       header('Location: ../admin.php');
     }
   }

 ?>
