<?php
include "header.php";
if(!isset($_SESSION['admin'])){
  header('Location: index.php');
}
include "functions/db-config.php";
include "functions/geturl.php";

if(isset($_POST['logout'])){
$_SESSION['logged']=null;
if(isset($_SESSION['admin'])){
unset($_SESSION['admin']);
}
header('Location:index.php');
}

$sql = "SELECT * FROM category";
$stat = $pdo->prepare($sql);
$stat->execute();
$res2 = $stat->fetchAll();

if(isset($_POST['date'])){
  $date=date('Y/m/d', strtotime($_POST['date']));
  $sql = "SELECT * FROM orders where orderDate=?";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $date, PDO::PARAM_STR);
  $stat->execute();
  $res = $stat->fetchAll();
}
else{
$sql = "SELECT * FROM orders where orderDate=CURRENT_DATE()";
$stat = $pdo->prepare($sql);
$stat->execute();
$res = $stat->fetchAll();
}

if(isset($_POST['cat_submit'])){
  $sql = "INSERT into category values (null,?)";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $_POST['cat_name'], PDO::PARAM_STR);
  $stat->execute();
  header('Location:admin.php');
}

if(isset($_POST['cat_rem_submit'])){
  $sql = "DELETE FROM category where id_cat=?";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $_POST['cat_id'], PDO::PARAM_STR);
  $stat->execute();
  $sql = "DELETE FROM food where id_cat=?";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(1, $_POST['cat_id'], PDO::PARAM_STR);
  $stat->execute();
  header('Location:admin.php');
}
 ?>


 <div id="textplace" class="text-center order-main">
     <h1 style="font-size: 32px;">Gledanje narudzbina</h1>
     <p>Izaberite dan u kom ocete da vidite narudzbine,<?php if(isset($_POST['date'])):?> Izabrane su za <b><?php echo date('d/m/Y', strtotime($_POST['date']))."</b>"; else: ?>automatski su izabrane za <b>danasnji dan.</b><?php endif; ?></p>

     <form class="" action="admin.php" method="post">
       <input type="date" class="date-time" name="date" value="<?php if(isset($_POST['date'])) echo $_POST['date'] ; else date('Y-m-d'); ?>">
        <input style=""  class="input date-picker" type="submit" name="change_date" value="Promeni datum"/>
     </form>

  <div class=" order-area">
      <div class="flex-column price-area">
     <?php $rb=0; foreach ($res as $separate) :  $rb++;?>

       <button class="accordion">Narudzbina br.<?php echo $rb; ?> <i class="fas fa-arrow-down"></i></button>
       <div class="panel">
       <div class="order-cont flex-column">
         <?php
         $sql = "SELECT * FROM order_food where id_order=? and amount >=1";
         $stat = $pdo->prepare($sql);
         $stat->bindParam(1, $separate['id_order'], PDO::PARAM_INT);
         $stat->execute();
         $food_order = $stat->fetchAll();
         $k=0;
         foreach ($food_order as $separatefood) :

            $sql = "SELECT * FROM food where id_food=?";
            $stat = $pdo->prepare($sql);
            $stat->bindParam(1, $separatefood['id_food'], PDO::PARAM_INT);
            $stat->execute();
            $resfood = $stat->fetchAll();
            foreach ($resfood as $food):
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
                 <p class="amount">Narucena <b><u>kolicina</u></b> od <b><?php echo $separatefood['amount']; ?></b></p>
           </form>
         </div>
       </div>
     <?php endforeach; endforeach;
     if($separate['Delivered']==1):
     ?>
     <p>Ova porudzbina je doneta!</p>
   <?php else: ?>
     <p>Ova porudzbina je u procesu dostavljanja</p>
   <?php endif; ?>
       </div>
     </div>
     <?php endforeach; ?>
     </div>
   </div>
     </div>

     <div id="textplace" class="text-center">
         <h1 style="font-size: 32px;">Dodavanje nove hrane</h1>
         <p>Unesite sve potrebne informacije za hranu i unesite!</p>
         <div class="flex j-center">

         <div class=" food-input">
           <form class="" enctype="multipart/form-data" action="functions/addfood.php" method="post">
             <input type="text" name="food_name" value="" placeholder="Ime hrane">
              <textarea name="food_desc" rows="4" cols="40" placeholder="Opis hrane.."></textarea>
              <div class="flex j-center"><input type="number" class="number-input" name="food_price" value="200" >Din</div>
              <input type="file" name="food_image" value=""/>

              Kategorija hrane:
              <select name="food_category">
              <?php $sql = "SELECT * FROM category";
              $stat = $pdo->prepare($sql);
              $stat->execute();
              $res = $stat->fetchAll();
              foreach ($res as $cat) :?>
              <option value="<?= $cat['id_cat']; ?>"><?= $cat['name']; ?></option>
            <?php endforeach; ?>
          </select>
           <input style="" class="input add_food" type="submit" name="add_food" value="Dodaj hranu u meni!"/>
           </form>
         </div>

       </div>
     </div>

     <div id="textplace" class="text-center">
         <h1 style="font-size: 32px;">Editovanje i brisanje hrane</h1>
         <p>Stisnite na dugme pored hrane koje ocete da menjate!</p>
         <div class="flex j-center">
           <div class="flex-column price-area">
             <?php
             //counter for forms
             $k=0;
             foreach($res2 as $item){?>
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
                    <img class="food-img" src="<?php echo $food['photo']; ?>" alt="">
                  </div>
                  <div class="food-desc">
                       <p><?php echo $food['Name']; ?></p>
                       <p><?php echo $food['Description']; ?></p>
                   </div>
                    <div class="food-desc">
                       <p><?php $k++; echo $food['Price']; ?> DIN</p>
                      <a href="<?php echo "functions/editfood.php?foodid=".$food['id_food'].""?>">
                           <p><button type="submit" class="edit-food-btn input"  href="#">Editujte</button></p>
                         </a>
                     </div>
                     </div>
                     <?php } ?>
                   </div>
                 <?php
             }
             ?>


             <div id="textplace" class="text-center">
                 <h1 style="font-size: 32px;">Kategorije</h1>
                 <p>Ovde mozete dodavati i brisati kategorije</p>

             <form name="cat_add" id="cat_add" method="post" action="admin.php">
               <div class="flex-column j-center">
                 <div class="flex j-center">
                 <input type="text" name="cat_name" class="cat_add_name" value="" placeholder="Ime kategorije">
               </div>
                 <input type="submit" name="cat_submit"  class="input cat_add" value="Dodaj kategoriju">
                 </div>
             </form>
             <form name="cat_rem" id="cat_add" method="post" action="admin.php">
               <div class="flex-column j-center">
                 <div class="flex j-center">
                   <select name="cat_id" class="cat-select">
                   <?php
                   $sql = "SELECT * FROM category";
                   $stat = $pdo->prepare($sql);
                   $stat->execute();
                   $res = $stat->fetchAll();
                   foreach($res as $item){?>
                       <option value="<?php echo $item["id_cat"]?>"><?php echo $item["name"]?></option>
                       <?php
                   }
                   ?>
                 </select>
               </div>
               <div class="flex-column j-center">
                 <div class="flex j-center">
                 <input type="text" name="cat_name" class="cat_add_name" value="" placeholder="Ime kategorije">
               </div>
                 <input type="submit" name="cat_submit"  class="input cat_add" value="Izmeni kategoriju">
                 </div>
                 </div>
               </div>
                 <input type="submit" name="cat_rem_submit"  class="input cat_add" value="Izbrisi kategoriju">
                 </div>
             </form>
           </div>
     </div>
     <div id="textplace" class="text-center">
         <h1 style="font-size: 32px;">Odjavljivanje</h1>
         <p>Da li ste sigurni da zelite da se odjavite?</p>

     <form name="register" id="register" method="post" action="admin.php">
       <div class="flex j-center">

             <br>
             <br>
               <input style="" class="input" type="submit" name="logout" value="Izloguj se!"/>

             </div>



         </div>
     </form>
     <script src="js/accordion.js"></script>
   </body>
   </html>
