<?php  if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Dostava Veljko</title>
    <link rel="stylesheet" href="../project_style.css">
</head>
<body>
<div id="header"><img src="../logo.png" alt="logo" align="center" width="250" height="87.5">
  <div id="menuToggle">

    <input type="checkbox" />

    <span></span>
    <span></span>
    <span></span>

    <ul id="menu">
      <li><a style="word-spacing: normal" class="hamb-link"  href="../index.php">Glavna stranica</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="../cenovnik.php">Cenovnik</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="../kontakt.php">Kontakt</a></li>
      <?php if(!isset($_SESSION['logged'])):?>
      <li><a style="word-spacing: normal" class="hamb-link"  href="../login.php">Prijava</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="../register.php">Registracija</a></li>

    <?php elseif(isset($_SESSION['admin'])): ?>
      <li><a style="word-spacing: normal"  class="hamb-link" href="../user.php">Ulogovan admin: <?php echo $_SESSION['logged_name']; ?></a></li>
    <?php else: ?>
      <li><a style="word-spacing: normal"  class="hamb-link" href="../user.php">Ulogovan kao: <?php echo $_SESSION['logged_name']; ?></a></li>
    <?php endif; ?>
    </ul>
  </div>
  <hr style="margin-left: 15px; margin-right:15px; background-color: #000000; border: #004080 1px solid">
    <div id="link">
      <a style="word-spacing: normal" class="thislink" href="../index.php">Glavna stranica</a>
      <a style="word-spacing: normal" class="thislink" href="../cenovnik.php">Cenovnik</a>
      <a style="word-spacing: normal" class="thislink" href="../kontakt.php">Kontakt</a>
      <?php if(!isset($_SESSION['logged'])):?>
      <a style="word-spacing: normal" class="thislink" href="../login.php">Prijava</a>
      <a style="word-spacing: normal" class="thislink" href="../register.php">Registracija</a>

    <?php elseif(isset($_SESSION['admin'])): ?>
      <a style="word-spacing: normal"  class="thislink" href="../user.php">Ulogovan admin: <?php echo $_SESSION['logged_name']; ?></a>
    <?php else: ?>
      <a style="word-spacing: normal"  class="thislink" href="../user.php">Ulogovan kao: <?php echo $_SESSION['logged_name']; ?></a>
    <?php endif; ?>
    </div>
    </table>
</div>


<?php
if(!isset($_SESSION['admin'])){
  header('Location: index.php');
}
include "db-config.php";
include "geturl.php";
$sql = "SELECT * FROM food where idFood=?";
$stat = $pdo->prepare($sql);
$stat->bindParam(1, $_GET['foodid'], PDO::PARAM_INT);
$stat->execute();
$res = $stat->fetch();

if(isset($_POST['del_food'])){
  unlink('../'.$res['photo']);
  $sql = "DELETE from  food where idFood=?";
  $stat = $pdo->prepare($sql);
   $stat->bindParam(1, $_GET['foodid'], PDO::PARAM_STR);
       $stat->execute();
       header('Location:../admin.php');
}

if(isset($_POST['edit_food'])){

if(!empty($_FILES["food_image"]["name"])){
//delete previous image
unlink('../'.$res['photo']);

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
       $sql = "UPDATE  food SET Name=?,Description=?,Price=?,Photo=?,id_cat=? where idFood=?";
       $stat = $pdo->prepare($sql);
       $stat->bindParam(1, $_POST['food_name'], PDO::PARAM_STR);
       $stat->bindParam(2, $_POST['food_desc'], PDO::PARAM_STR);
       $stat->bindParam(3, $_POST['food_price'], PDO::PARAM_STR);
       $stat->bindParam(4, $namefull, PDO::PARAM_STR);
       $stat->bindParam(5, $_POST['food_category'], PDO::PARAM_STR);
       $stat->bindParam(6, $_GET['foodid'], PDO::PARAM_STR);
       $stat->execute();
       print_r($stat->errorInfo());
       //$res = $stat->fetchAll();

       header('Location: editfood.php?foodid='.$_GET['foodid'].'');
     }
   }
 }
else{
  $sql = "UPDATE  food SET Name=?,Description=?,Price=?,Photo=?,id_cat=? where idFood=?";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $_POST['food_name'], PDO::PARAM_STR);
  $stat->bindParam(2, $_POST['food_desc'], PDO::PARAM_STR);
  $stat->bindParam(3, $_POST['food_price'], PDO::PARAM_STR);
  $stat->bindParam(4, $res['photo'], PDO::PARAM_STR);
  $stat->bindParam(5, $_POST['food_category'], PDO::PARAM_STR);
  $stat->bindParam(6, $_GET['foodid'], PDO::PARAM_STR);
  $stat->execute();
  //print_r($stat->errorInfo());
  header('Location:editfood.php?foodid='.$_GET['foodid'].'');
}

}
?>



<div id="textplace" class="text-center order-main">
    <h1 style="font-size: 32px;">Editovanje <?= $res['Name'] ?></h1>
    <p>Ispod mozete da editujete sve delove hrane koje zelite.</p>

    <div class="flex j-center">

    <div class=" food-input">
      <form class="" enctype="multipart/form-data" action="editfood.php?foodid=<?= $_GET['foodid'] ;?>" method="post">
        <div class="flex edit">
        Ime Hrane: <input type="text" class="edit_food" name="food_name" value="<?= $res['Name'] ?>" placeholder="Ime hrane">
      </div>
      <div class="flex edit">
        Deskripcija: <textarea name="food_desc" class="edit_food" rows="4" cols="40" placeholder="Opis hrane.."><?= $res['Description'] ?></textarea>
         </div>
         <div class="flex edit">Cena: <input type="number" class="number-input edit_food" name="food_price" value="<?= $res['Price'] ?>" >Din</div>
        <div class="flex j-center"> <span class="margin-top-1">Slika:</span> <img src="../<?= $res['photo'] ?>" class="edit-img" alt="food_photo"></div>
         <input type="file" name="food_image" value=""/>

         Kategorija hrane:
         <select name="food_category">
         <?php $sql = "SELECT * FROM category";
         $stat = $pdo->prepare($sql);
         $stat->execute();
         $cats = $stat->fetchAll();
         foreach ($cats as $cat) :?>
         <option <?php if($cat['id_cat']==$res['id_cat']) echo "selected"; ?> value="<?= $cat['id_cat']; ?>"><?= $cat['name']; ?></option>
       <?php endforeach; ?>
     </select>
      <input style="" class="input add_food" type="submit" name="edit_food" value="Izmeni hranu!"/>
      </form>
      <form class="" action="editfood.php?foodid=<?= $_GET['foodid'] ;?>" method="post">
        <input style="" class="input add_food del_btn" type="submit" name="del_food" value="Izbrisi hranu!"/>
      </form>
    </div>

  </div>

  </div>
