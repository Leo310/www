<?php
session_start();
include("include/inc_htmlhead");
include('include/inc_htmlkopfzeile.php');
$error2 = "";
if(isset($_SESSION['error2'])) $error2 = $_SESSION['error2'];
if ($_SESSION['rechte'] !== "admin") header("location:index.php");

?>

<h1>Nutzerliste</h1>
<?php
	if($error2){
		echo "<p>$error2</p>";
		unset($_SESSION['error2']);
	}
?>
<div style='margin-left:auto; margin-right:auto; margin-top:150px; min-width:500px; width:50%;'>
<table>
<thead>
<tr><th>Nutzername</th><th>Passwort</th><th>Rechte</th></tr>
</thead>
<tbody>
<?php
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
foreach($users as $user){
	$daten = explode(";",$user);
	echo "<tr><td>".$daten[0]."</td><td>".$daten[1]."</td><td>".$daten[2]."</td>";
	echo "<td><form action='bnutzerListe.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input type='submit' value='✎'></form></td><td><form action='scr_deleteuser.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input type='submit' value='🗑'></form></td></tr>\n";
}

?>
<tr></tr>
</tbody>
</table>
</div>
</body>
</html>
