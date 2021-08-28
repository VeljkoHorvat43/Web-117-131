<?php include "header.php"; ?>
    <br>
    <div id="textplace" style="text-align: left;">
        <h1 style="font-size: 32px;">Dobro došli na naš sajt!</h1>
        <p>Naš zvanični sajt. Sedište naše firme je u Subotici, a vršimo dostavu hrane na teritoriji Republike Srbije. Raznovrsna hrana: sendviči, pljeskavice,
        ćevapi, salate, supe, čorbe, riblji specijaliteti. Brza i efikasna dostava.<?php if(!isset($_SESSION['logged'])): ?> Da biste mogli naručivati hranu,
        potrebno je da se <a href="login.php">prijavite</a> na naš sajt.</p>
        <p>Ukoliko nemate nalog, kliknite na <a href="register.php">ovaj link</a> da biste se registrovali.</p>
      <?php else: ?>
        <p>Zdravo <?php echo $_SESSION['logged_name']; ?>! Idite na <a href="cenovnik.php">cenovnik</a> da narucite hranu!</p>
      <?php endif; ?>


    </div>

</body>
</html>
