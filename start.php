<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
?>
<body class="body" background="images/bild3.jpg"> 
<div class="menucontainer">
	<div style="margin-left:50px; margin-top:15px">
		<h3 style="display:inline;" class="menupunkt"><a href="scr_logout.php" class="a">⏻ abmelden</a></h3>
		<h3 style="display:inline; margin-left:20px" class="menupunkt"><a href="pwchange.php" class="a">✏  passwort ändern</a></h3>
		<h3 style="display:inline; margin-left:20px" class="menupunkt"><a href="scr_deleteuser.php" class="a">x nutzer löschen</a></h3>
	</div>
</div>


<h2>Herzlich Wilkommen: <font color="green"><?php echo $_SESSION['user'];?></font><font color="white">! </h2></font>

</body>
</html>