<?php
include "functions/db-config.php";
include "functions/geturl.php";
$sql = "SELECT * FROM category";
$stat = $pdo->prepare($sql);
$stat->execute();
$res = $stat->fetchAll();

//get order of user in this page
if(isset($_SESSION['logged'])){
$sqlorder = "SELECT idOrder FROM orders where id_user = :id and delivered=0";
$stat = $pdo->prepare($sqlorder);
$stat->bindParam(':id', $_SESSION['logged'], PDO::PARAM_STR);
$stat->execute();
$order = $stat->fetch();
}

include "header.php";
$_SESSION['url']=$url;
?>
<br>
<div id="textplace">
    <h1 style="font-size: 32px;">Cenovnik</h1>
    <?php if (isset($_SESSION['logged'])): ?>
      <h2>Stisnite na "+" kako bi dodali u narudzbinu!</h2>
    <?php else: ?>
      <h2><a href="login.php">Prijavite se </a> ili se <a href="register.php">registrujte</a> kako bi mogli poruciti!</h2>
        <?php endif; ?>
    <div class="flex-column price-area">
      <?php
      //counter for forms
      $k=0;
      foreach($res as $item){?>
          <button class="accordion"><?php echo $item['name']; ?> <i class="fas fa-arrow-down"></i></button>
          <div class="panel">
            <?php $id=$item['id_cat'];
            $sql = "SELECT * FROM food where id_cat=$id ";
            $stat = $pdo->prepare($sql);
            $stat->execute();
            $foods = $stat->fetchAll();
              foreach($foods as $food){
             ?>
             <div class="flex food-cont">
               <div class="img-cont">
             <img class="food-img" src="<?php echo $food['photo']; ?>" alt=""></img>
           </div>
           <div class="food-desc">
                <p><?php echo $food['Name']; ?></p>
                <p><?php echo $food['Description']; ?></p>
            </div>
             <div class="food-desc">
                <p><?php $k++; echo $food['Price']; ?> DIN</p>
                <?php if (isset($_SESSION['logged']) && !(isset($_SESSION['admin']))):
                  $sql = "SELECT amount FROM order_food  where idOrder = ? AND idFood = ? ";
                  $stat = $pdo->prepare($sql);
                  $stat->bindParam(1, $order['idOrder'], PDO::PARAM_INT);
                  $stat->bindParam(2, $food['idFood'], PDO::PARAM_INT);
                  $stat->execute();
                  $separate = $stat->fetch();
                  ?>
                <form method="post" id="form<?php echo $k; ?>" action="<?php echo "functions/addtoorder.php?user=".$_SESSION['logged']."&foodid=".$food['idFood'].""?>">
                    <p><button type="submit" class="buy-a" form="form<?php echo $k; ?>" href="#"><i class="fas fa-plus-circle"></i></button><input name="count" class="counter"  type="number" max=30 min=1 value=1></p>
                  <?php if($separate['amount']==null || $separate['amount']==0 ): ?>
                    <p class="amount">Nemate ovaj proizvod u korpi</p>
                    <?php elseif($separate['amount']!=null): ?>
                    <p class="amount">Imate <b><u>kolicinu</u></b> od <b><?php echo $separate['amount']; ?></b> u korpi.</p>
                  <?php endif; ?>
                        </form>
                <?php endif; ?>

              </div>
              </div>
              <?php } ?>
            </div>
          <?php
      }
      ?>

<script src="js/accordion.js"></script>
</body>
</html>
