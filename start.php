<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
?>
<body class="body" background="images/bild3.jpg">

  <!-- always used menu -->
  <button style="float:right; margin-top:0.5%; margin-right:1%" class="abmeldebutton" onClick="window.location.href='scr_logout.php'">abmelden »</button>

  <h1 style="float:right; margin-top:0.7%; margin-right:2%" class="userloggedin"><?php echo $_SESSION['user'];?></h2>
  <h1 style="float:right; margin-top:0.7%; margin-right:3%" class="userloggedin">|</h2>


  <button style="float:right; margin-top:0.4%; margin-right:2%" class="menubutton" onClick="window.location.href='deleteuser.php'">account löschen</button>
  <button style="float:right; margin-top:0.4%; margin-right:0.3%" class="menubutton" onClick="window.location.href='pwchange.php'">passwort ändern</button>
  <!-- end of always used menu -->

  <!-- optional back button top left --> <button style="float:left; margin-top:0.4%; margin-left:-1%" class="menubutton" onClick="window.location.href='scr_logout.php'">« zurück</button>


</body>
</html>
