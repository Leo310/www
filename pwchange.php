<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 if (!isset($_SESSION['user'])) header("location:index.php");
 include("include/inc_htmlhead");
 
 $error = "";
 $pwchanged = "";
 if (isset($_SESSION['error'])) $error = $_SESSION['error'];
 if (isset($_SESSION['pwchanged'])) $error = $_SESSION['pwchanged'];
 
?>
<body>
<h2>Nutzerinterface: <font color="red">Aendern des Passworts</font></h2>
<button onClick="window.location.href='scr_logout.php'">Abmelden</button>

<div style='margin-left:auto; margin-right:auto; margin-top:150px; min-width:500px; width:50%;'>
<form action='scr_pwchange.php' method='post'>
<?php 
  if ($error) {
	  echo "<h4>$error</h4>"; 
	  unset($_SESSION['error']);
  }

  if ($pwchanged) {
	  echo "<h4>$pwchanged</h4>"; 
	  unset($_SESSION['pwchanged']);
  }
?>
	<table>
		<tr>
			<td><label for='nutzer'>altes Passwort</label></td>
			<td><input type='password' name='oldpw' id='altespw'></td>
		</tr>
		<tr>	
			<td><label for='nutzer'>neues Passwort</label></td>
			<td><input type='password' name='newpw' id='neuespw'></td>
		</tr>
		<tr>
			<td><label for='nutzer'>neues Passwort bestaetigen</label></td>
			<td><input type='password' name='bnewpw' id='bneuespw'></td>
		</tr>		
		
		<tr></tr>
		<tr>	
			<td></td>
			<td><input type='submit' value='neues Passwort speichern'></td>
		</tr>
		
	</table>
</form>

<br>
<br>

</div>
</body>
</html>