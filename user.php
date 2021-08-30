<?php
include "header.php";
if(isset($_SESSION['admin'])){
  header('Location:admin.php');
}
include "functions/db-config.php";
include "functions/geturl.php";
$sql = "SELECT * FROM order_food where idOrder=(SELECT idOrder from orders WHERE id_user = :id and delivered=0) AND amount >= 1";
$stat = $pdo->prepare($sql);
$stat->bindParam(':id', $_SESSION['logged'], PDO::PARAM_STR);
$stat->execute();
$res = $stat->fetchAll();
$_SESSION['url']=$url;
//check res
//var_dump($res);

//finish order
if(isset($_POST['finish'])){
  //get the order and end it
  $sql = "UPDATE orders SET delivered = 1 where id_user=? AND delivered = 0";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $_SESSION['logged'], PDO::PARAM_STR);
  $stat->execute();
  $order = $stat->fetch();
}

//logout..
if(isset($_POST['logout'])){
$_SESSION['logged']=null;
if(isset($_SESSION['admin'])){
$_SESSION['admin']=null;
}
header('Location:index.php');
}
?>

<br>
<div id="textplace" class="text-center order-main">
    <h1 style="font-size: 32px;">Vasa Narudzbina</h1>
    <p>Dole mozete videti sta ste porucili i da uklonite iz narudzbine..</p>

      <div class="flex-column order-area">
        <?php
        $k=0;
          foreach($res as $separate){
          $id=  $separate['idFood'];
            $sql = "SELECT * FROM food where idFood=$id ";
            $stat = $pdo->prepare($sql);
            $stat->execute();
            $food = $stat->fetch();
         ?>
         <div class="flex food-cont order-user-food">
           <div class="img-cont">
         <img class="food-img" src="<?php echo $food['photo']; ?>" alt=""></img>
       </div>
       <div class="food-desc">
            <p><?php echo $food['Name']; ?></p>
            <p><?php echo $food['Description']; ?></p>
        </div>
         <div class="food-desc">
            <p><?php $k++; echo $food['Price']; ?> DIN</p>
            <form method="post" id="form<?php echo $k; ?>" action="<?php echo "functions/addtoorder.php?user=".$_SESSION['logged']."&foodid=".$food['idFood'].""?>">
            <?php if (isset($_SESSION['logged'])): ?>
                <p><button type="submit" class="buy-a" form="form<?php echo $k; ?>" href="#"><i class="fas fa-plus-circle"></i></button><input name="count" class="counter-order"  type="number" max=30 min=1 value=1></p>
                <p class="amount">Imate <b><u>kolicinu</u></b> od <b><?php echo $separate['amount']; ?></b> u korpi.</p>
            <?php endif; ?>
          </form>
            <form method="post" id="form-minus-<?php echo $k; ?>" action="<?php echo "functions/remtoorder.php?user=".$_SESSION['logged']."&foodid=".$food['idFood'].""?>">
          <p><button type="submit" class="buy-a" form="form-minus-<?php echo $k; ?>" href="#"><i class="fas fa-minus-circle"></i></button><input name="count" class="counter-order"  type="number" max=30 min=1 value=1></p>
        </form>
        </div>
      </div>
      <?php } ?>
    </div>
<?php if(isset($separate)): ?>
  <form class="" action="user.php" method="post">

  <div class="flex j-center">
    <input  class="input" type="submit" style="width:auto; margin-top:5px; padding-top:5px; padding-bottom:5px" name="finish" value="Oznacite narudzbinu kao donetu!"/>
      </div>
</div>

  </form>
<?php endif; ?>
<br>
<div id="textplace" class="text-center">
    <h1 style="font-size: 32px;">Odjavljivanje</h1>
    <p>Da li ste sigurni da zelite da se odjavite?</p>
</div>

<form name="register" id="register" method="post" action="user.php">
  <div class="flex j-center">

        <br>
        <br>
          <input  class="input" type="submit" name="logout" value="Izloguj se!"/>

        </div>



    </div>
</form>
<br>
</body>
</html>
