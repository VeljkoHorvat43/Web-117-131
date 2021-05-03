<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="project_style.css">
    <script src="ValidateForm.js"></script>
</head>
<body>
<div id="header"><img src="logo.png" alt="logo" align="center" width="250" height="87.5"><hr style="margin-left: 15px; margin-right:15px; background-color: #000000; border: #004080 1px solid">
    <div id="link">
        <a style="word-spacing: normal" class="thislink" href="index.html">Glavna stranica</a>
        <a style="word-spacing: normal" class="thislink" href="cenovnik.html">Cenovnik</a>
        <a style="word-spacing: normal" class="thislink" href="kontakt.html">Kontakt</a>
        <a style="word-spacing: normal" class="thislink" href="login.php">Prijava</a>
        <a style="word-spacing: normal" class="thislink" href="register.php">Registracija</a>
    </div>
    </table>
</div>

<br>
<div id="textplace">
    <h1 style="font-size: 32px;">Registracija</h1>
    <p>Za registraciju potrebno je da popunite polja koja se nalaze ispod. Nakon što kliknete na dugme "Registruj se",
    poslaćemo Vam link za aktivaciju profila na Vaš mejl.</p>
</div>
<br>
<form name="register" id="register" method="post" action="activation.php">
    <div id="textplace" style="float: left; width: 40%">
    Ime: <br><input style="height: 25px; width:100%" type="text" name="firstName" id="firstName"><br>
    <span id="e_name" style="color: #f00; font-size: 13px"></span><br>
    Prezime:<br><input style="height: 25px;width:100%" type="text" name="lastName" id="lastName"><br>
    <span id="e_lname" style="color: #f00; font-size: 13px"></span><br>
    Korisničko ime:<br><input style="height: 25px;width:100%" type="text" name="username" id="username"><br>
    <span id="e_user" style="color: #f00; font-size: 13px"></span><br>
    Šifra: <br><input style="height: 25px;width:100%" type="password" name="pass" id="pass"><br>
    <span id="e_pass" style="color: #f00; font-size: 13px"></span><br>
    </div>
    <div id="textplace" style="float:right; text-align: left; width: 40%">
    Ponovite šifru: <br><input style="height: 25px;width:100%" type="password" name="repeatp" id="repeatp"><br>
    <span id="e_rp" style="color: #f00; font-size: 13px"></span><br>
    Email: <br><input style="height: 25px;width:100%;" type="email" name="mail" id="mail"><br>
    <span id="e_mail" style="color: #f00; font-size: 13px"></span><br>
    Grad:<br>
        <select name="city" id="city" style="height: 31px; width: calc(100% + 6px);box-sizing:content-box;">
            <option>Izaberite mesto</option>
            <option>Ada</option>
            <option>Aleksandrovac</option>
            <option>Aleksinac</option>
            <option>Apatin</option>
            <option>Aranđelovac</option>
            <option>Arilje</option>
            <option>Bajina Bašta</option>
            <option>Bačka Palanka</option>
            <option>Bačka Topola</option>
            <option>Bečej</option>
            <option>Bela Crkva</option>
            <option>Beograd - Barajevo</option>
            <option>Beograd - Čukarica</option>
            <option>Beograd - Grocka</option>
            <option>Beograd - Novi Beograd</option>
            <option>Beograd - Palilula</option>
            <option>Beograd - Sopot</option>
            <option>Beograd - Voždovac</option>
            <option>Beograd - Zemun</option>
            <option>Beograd - Zvezdara</option>
            <option>Blace</option>
            <option>Bogatić</option>
            <option>Bor</option>
            <option>Bosilegrad</option>
            <option>Brus</option>
            <option>Bujanovac</option>
            <option>Čačak</option>
            <option>Čajetina</option>
            <option>Ćuprija</option>
            <option>Despotovac</option>
            <option>Dimitrovgrad</option>
            <option>Đakovica</option>
            <option>Gnjilane</option>
            <option>Gornji Milanovac</option>
            <option>Golubac</option>
            <option>Inđija</option>
            <option>Ivanjica</option>
            <option>Jagodina</option>
            <option>Kanjiža</option>
            <option>Kikinda</option>
            <option>Kladovo</option>
            <option>Knjaževac</option>
            <option>Koceljeva</option>
            <option>Kosjerić</option>
            <option>Kosovska Mitrovica</option>
            <option>Kovačica</option>
            <option>Kovin</option>
            <option>Kragujevac</option>
            <option>Kraljevo</option>
            <option>Krupanj</option>
            <option>Kruševac</option>
            <option>Kuršumlija</option>
            <option>Kučevo</option>
            <option>Kula</option>
            <option>Lazarevac</option>
            <option>Leposavić</option>
            <option>Leskovac</option>
            <option>Ljig</option>
            <option>Ljubovija</option>
            <option>Loznica</option>
            <option>Mali Zvornik</option>
            <option>Majdanpek</option>
            <option>Medveđa</option>
            <option>Mladenovac</option>
            <option>Negotin</option>
            <option>Niš</option>
            <option>Nova Varoš</option>
            <option>Novi Bečej</option>
            <option>Novi Pazar</option>
            <option>Novi Sad</option>
            <option>Obrenovac</option>
            <option>Odžaci</option>
            <option>Opovo</option>
            <option>Osečina</option>
            <option>Pančevo</option>
            <option>Paraćin</option>
            <option>Peć</option>
            <option>Pećinci</option>
            <option>Petrovac na Mlavi</option>
            <option>Pirot</option>
            <option>Požarevac</option>
            <option>Požega</option>
            <option>Preševo</option>
            <option>Priboj</option>
            <option>Prijepolje</option>
            <option>Priština</option>
            <option>Prizren</option>
            <option>Prokuplje</option>
            <option>Ruma</option>
            <option>Senta</option>
            <option>Sjenica</option>
            <option>Smederevo</option>
            <option>Smederevska Palanka</option>
            <option>Sombor</option>
            <option>Srbobran</option>
            <option>Sremska Mitrovica</option>
            <option>Stara Pazova</option>
            <option>Subotica</option>
            <option>Surdulica</option>
            <option>Svilajnac</option>
            <option>Svrljig</option>
            <option>Šabac</option>
            <option>Šid</option>
            <option>Temerin</option>
            <option>Topola</option>
            <option>Trgovište (Pčinjski okrug)</option>
            <option>Trstenik</option>
            <option>Tutin</option>
            <option>Ub</option>
            <option>Uroševac</option>
            <option>Užice</option>
            <option>Valjevo</option>
            <option>Velika Plana</option>
            <option>Veliko Gradište</option>
            <option>Vladičin Han</option>
            <option>Vlasotince</option>
            <option>Vranje</option>
            <option>Vrbas</option>
            <option>Vrnjačka Banja</option>
            <option>Vršac</option>
            <option>Vučitrn</option>
            <option>Zaječar</option>
            <option>Zrenjanin</option>
            <option>Žabalj</option>
            <option>Žitište</option>
        </select>
    <br>
    <span id="e_ddl" style="color: #f00; font-size: 13px"></span>
    <br>
    </div>
    <div id="textplace" style="float:right; text-align: center; width: 40%">
    <input style="background-color: #004fff; border: 1px solid #004fff; height:30px; width: 130px; font-size: 100%; margin-left: auto; margin-right: auto; text-align: center; border-radius: 8px; color: #fff;" type="submit" name="register" value="Registruj se!">
    </div>


</form>
</body>
</html>