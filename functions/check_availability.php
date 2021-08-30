<?php
require_once("db-config.php");

if(!empty($_POST["username"])) {
  $sql = "SELECT count(*) FROM users where username = :username";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(':username', $_POST["username"], PDO::PARAM_STR);
  if (!$stat->execute()) {
    print_r($st->errorInfo());
};
//  $res = $stat->fetch();
  $res  = (int) $stat->fetchColumn();
  if($res>0) {
      echo "<span class='status-not-available'> Username je vec koriscen.</span>";
  }else{
      echo "<span class='status-available'> Username je slobodan.</span>";
  }
}

if(!empty($_POST["email"])) {
  $sql = "SELECT count(*) FROM users where email = :email";
  $stat = $pdo->prepare($sql);
  $stat->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
  if (!$stat->execute()) {
    print_r($st->errorInfo());
};
//  $res = $stat->fetch();
  $res  = (int) $stat->fetchColumn();

  if($res>0) {
      echo "<span class='status-not-available'> E-Mail je vec koriscen.</span>";
  }else{
      echo "<span class='status-available'> E-Mail se moze koristiti.</span>";
  }
}
?>
