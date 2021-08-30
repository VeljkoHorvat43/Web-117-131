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
    <title>Dostava Horvat</title>
    <link rel="stylesheet" href="project_style.css">
</head>
<body>
<div id="header"><img src="logo.png" alt="logo" align="center" width="250" height="87.5">
  <div id="menuToggle">

    <input type="checkbox" />

    <span></span>
    <span></span>
    <span></span>

    <ul id="menu">
      <li><a style="word-spacing: normal" class="hamb-link"  href="index.php">Glavna stranica</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="cenovnik.php">Cenovnik</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="kontakt.php">Kontakt</a></li>
      <?php if(!isset($_SESSION['logged'])):?>
      <li><a style="word-spacing: normal" class="hamb-link"  href="login.php">Prijava</a></li>
      <li><a style="word-spacing: normal" class="hamb-link"  href="register.php">Registracija</a></li>

    <?php elseif(isset($_SESSION['admin'])): ?>
      <li><a style="word-spacing: normal"  class="hamb-link" href="user.php">Ulogovan admin: <?php echo $_SESSION['logged_name']; ?></a></li>
    <?php else: ?>
      <li><a style="word-spacing: normal"  class="hamb-link" href="user.php">Ulogovan kao: <?php echo $_SESSION['logged_name']; ?></a></li>
    <?php endif; ?>
    </ul>
  </div>
  <hr style="margin-left: 15px; margin-right:15px; background-color: #000000; border: #004080 1px solid">
    <div id="link">
      <a style="word-spacing: normal" class="thislink" href="index.php">Glavna stranica</a>
      <a style="word-spacing: normal" class="thislink" href="cenovnik.php">Cenovnik</a>
      <a style="word-spacing: normal" class="thislink" href="kontakt.php">Kontakt</a>
      <?php if(!isset($_SESSION['logged'])):?>
      <a style="word-spacing: normal" class="thislink" href="login.php">Prijava</a>
      <a style="word-spacing: normal" class="thislink" href="register.php">Registracija</a>

    <?php elseif(isset($_SESSION['admin'])): ?>
      <a style="word-spacing: normal"  class="thislink" href="user.php">Ulogovan admin: <?php echo $_SESSION['logged_name']; ?></a>
    <?php else: ?>
      <a style="word-spacing: normal"  class="thislink" href="user.php">Ulogovan kao: <?php echo $_SESSION['logged_name']; ?></a>
    <?php endif; ?>
    </div>
    </table>
</div>
