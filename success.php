<?php  if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
} ?>
<?php
include "functions/db-config.php";
$username = trim($_POST['username']);
$password = trim($_POST['pass']);
//var_dump($username.$password);
$sql = "SELECT * FROM users where username = :username";
$stat = $pdo->prepare($sql);
$stat->bindParam(':username', $username, PDO::PARAM_STR);
$stat->execute();
$res = $stat->fetch();
//var_dump($res['passw']);
$isPasswordCorrect = password_verify($password, $res['passw']);
//var_dump($isPasswordCorrect);
if(!$isPasswordCorrect){
  header('Location:login.php');
}
else{
$_SESSION['logged']=$res['id_user'];
$_SESSION['logged_name']=$res['name'];
if($res['isAdmin'] == 1){
$_SESSION['admin']=$res['isAdmin'];
}
include "header.php";
?>
<br>
<div id="textplace" style="text-align:left">
  <?php
      $ime=$res['name'].' '.$res['lastname'];
  ?>
    <h1 style="font-size: 32px;">Uspesno ste se prijavili, <?php echo $ime; ?> !</h1>
    <?php if(isset($_SESSION['admin'])): ?>
      <p>Prijavili ste se kao admin sajta!</p>
    <?php else: ?>
    <p>Mozete da odete na <a href="cenovnik.php">cenovnik</a> da vidite cene nasih proizvoda, kao i da narucite nase proizvode.</p>
  <?php endif;  ?>
</div>

<br>
</body>
</html>
<?php } ?>
