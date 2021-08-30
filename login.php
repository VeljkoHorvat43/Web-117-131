<?php include "header.php"; ?>
<br>
<div id="textplace" class="text-center" style="text-align: left;">
    <h1 style="font-size: 32px;">Prijava</h1>
    <p>Za prijavu Vam je potrebno korisničko ime i šifra koju ste uneli prilikom registracije.</p>
</div>

<form name="register" id="register" method="post" action="success.php" style="align-content: start">
  <div>
    <div id="textplace" style="float: left; width: 40%; text-align: left;">
        Korisničko ime:<br><input style="height: 25px;width:100%; align-self: start" type="text" name="username" id="username"><br>
        <span id="e_user" style="color: #f00; font-size: 13px"></span><br>
        Šifra: <br><input style="height: 25px;width:100%" type="password" name="pass" id="pass"><br>
        <span id="e_pass" style="color: #f00; font-size: 13px"></span><br>
        <br>
        <br>

          <input  class="input" type="submit" name="login" value="Uloguj se!"/>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>



    </div>
</form>
<br>
</body>
</html>
