<?php
include "functions/db-config.php";
include "header.php";
?>

<br>
<div id="textplace">
    <h1 style="font-size: 32px;">Registracija</h1>
    <p>Za registraciju potrebno je da popunite polja koja se nalaze ispod. Nakon što kliknete na dugme "Registruj se",
    poslaćemo Vam link za aktivaciju profila na Vaš mejl.</p>
</div>
<br>
<form name="register" id="register" method="post" action="functions/insert-user.php" >
    <div id="textplace" style="float: left; text-align: left; width: 40%">
    Ime: <br><input style="height: 25px; width:100%" type="text" name="firstName" id="firstName"><br>
    <span name="e_name" id="e_name" style="color: #f00; font-size: 13px"></span><br>
    Prezime:<br><input style="height: 25px;width:100%" type="text" name="lastName" id="lastName"><br>
    <span name="e_lastName" id="e_lname" style="color: #f00; font-size: 13px"></span><br>
    Korisničko ime:<br><input style="height: 25px;width:100%" type="text" name="username" id="username" onBlur="checkAvailability()"><img src="img/loader.gif" width="30px" id="loaderIcon" style="display:none" />
    <span name="e_user" id="e_user" style="color: #f00; font-size: 13px"></span><br><br>
    Šifra (minimum 8 karaktera): <br><input style="height: 25px;width:100%" type="password" name="pass" id="pass"><br>
    <span name="e_pass" id="e_pass" style="color: #f00; font-size: 13px"></span><br>
    </div>
    <div id="textplace" style="float:right; text-align: left; width: 40%">
    Ponovite šifru: <br><input style="height: 25px;width:100%" type="password" name="repeatp" id="repeatp"><br>
    <span name="e_rp" id="e_rp" style="color: #f00; font-size: 13px"></span><br>
    Email: <br><input style="height: 25px;width:100%;" type="email" name="mail" id="mail" onBlur="checkAvailabilityEmail()"><img src="img/loader.gif" width="30px" id="loaderIcon2" style="display:none" /><br>
    <span name="e_mail" id="e_mail" style="color: #f00; font-size: 13px"></span><br>
    Phone: <br><input style="height: 25px;width:100%;" type="text" name="phone" id="phone"><br>
      <span name="e_phone" id="e_phone" style="color: #f00; font-size: 13px"></span><br>
    Adress: <br><input style="height: 25px;width:100%;" type="text" name="adress" id="adress"><br>
      <span name="e_address" id="e_address" style="color: #f00; font-size: 13px"></span> <br>
    Grad:<br>
        <select name="city" id="city" style="height: 25px; width: 100%;box-sizing:content-box;">
            <option>Izaberite mesto</option>
            <?php
            $sql = "SELECT * FROM city";
            $stat = $pdo->prepare($sql);
            $stat->execute();
            $res = $stat->fetchAll();
            foreach($res as $item){?>
                <option value="<?php echo $item["name_city"]?>"><?php echo $item["name_city"]?></option>
                <?php
            }
            ?>
        </select>
    <br>
    <span name="e_ddl" id="e_ddl" style="color: #f00; font-size: 13px"></span>
    <br><br>
    </div>
    <div  style="display: flex; text-align: center; width: 100%; justify-content:center;">
    <input  class="input" type="submit" name="register" value="Registruj se!">

    </div>
</form>
</body>
<script src="js/ValidateForm.js"></script>
</html>
