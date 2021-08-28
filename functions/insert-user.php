<?php
require "db-config-2.php";
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

class User
{
  public $username='';
  public $firstname='';
  public $lastname='';
  public $password='';
  public $city='';
  public $adress='';
  public $phone='';
  public $mail='';

  public function saveUser()
  {
    $conn=db();
    $hashed = password_hash($this->password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users VALUES (null,'$this->firstname','$this->lastname','$this->username','$hashed','$this->mail','$this->city',NOW(),'$this->adress','$this->phone',0,0,0)";
    var_dump($res = mysqli_query($conn, $query));
  //echo("Error description: " . $conn -> error);

  $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
  $to      = $this->mail; // Send email to our user
  $subject = 'Signup | Verification';
  $message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$this->firstname.' '.$this->lastname.'
Password: '.$this->password.'
------------------------

Please click this link to activate your account:
http://localhost/webprojekat/verify.php?email='.$this->mail.'

'; // Our message above including the link
$headers = 'From:noreply@dostava.com' . "\r\n";
//we have to set up smtp protocol on server for this to work
if(mail($to, $subject, $message, $headers)){
  echo "uspelo";
} // Send our email
else {
  echo "nije";
}

    header('Location:../activation.php');
  }

}
$user=new User;

$user->username = mysqli_real_escape_string($conn,trim($_POST['username']));
$user->firstname = mysqli_real_escape_string($conn,trim($_POST['firstName']));
$user->lastname = mysqli_real_escape_string($conn,trim($_POST['lastName']));
$user->password = mysqli_real_escape_string($conn,trim($_POST['pass']));
$user->city = mysqli_real_escape_string($conn,trim($_POST['city']));
$user->adress = mysqli_real_escape_string($conn,trim($_POST['adress']));
$user->phone = mysqli_real_escape_string($conn,trim($_POST['phone']));

$user->mail = mysqli_real_escape_string($conn,trim($_POST['mail']));

$sqlu = "SELECT * FROM users WHERE username = $user->username";
$sqle = "SELECT * FROM users WHERE email = $user->mail";

$resu = mysqli_query($conn,$sqlu);
$rese = mysqli_query($conn,$sqle);

//var_dump($resu);

if ($resu){
    $_POST["e_user"] = "Korisničko ime već postoji!";
    exit(json_encode(["status" => "1"]));
}
else if ($rese){
    $_POST["e_mail"] = "Ova email adresa je već korišćena!";
    exit(json_encode(["status" => "2"]));
}
else if((isset($_POST['firstName'])) && (isset($_POST['lastName'])) && (isset($_POST['username'])) && (isset($_POST['pass'])) && (strlen($_POST['pass']) >=8) && (isset($_POST['repeatp'])) && (strlen($_POST['pass']) === strlen($_POST['repeatp']) && (isset($_POST['mail'])))) {

      $user->saveUser();

    }
else exit(json_encode(["status" => "3"]));
