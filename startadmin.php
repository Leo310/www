<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
?>

<h2>Herzlich Wilkommen Admin: <font color="green"><?php echo $_SESSION['user'];?></font><font color="white">! </h2></font>
<button onClick="window.location.href='scr_logout.php'">Abmelden</button>
<button onClick="window.location.href='nutzerListe.php'">Nutzerliste</button>
</body>
</html>