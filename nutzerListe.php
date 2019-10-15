<?php
session_start();
include("include/inc_htmlhead");
include('include/inc_htmlkopfzeile.php');
$error2 = "";
if(isset($_SESSION['error2'])) $error2 = $_SESSION['error2'];
if ($_SESSION['rechte'] !== "admin") header("location:index.php");

?>

<?php
	if($error2){
		echo "<p>$error2</p>";
		unset($_SESSION['error2']);
	}
?>
<!-- <div style='margin-left:auto; margin-right:auto; margin-top:150px; min-width:500px; width:50%;'> -->
<center><div class="userlistcontainer">
<h1 style="margin-top: 3%;" class="frontheadline">admininterface: nutzerübersicht</h1>
<table cellspacing="5" cellpadding="3" style="margin-top: 3%;">
<thead>
<tr><th class="tablehead">nutzername</th><th class="tablehead">passwort</th><th class="tablehead">rechte</th></tr>
</thead>
<tbody class="tablecontent">
<?php
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
foreach($users as $user){
	$daten = explode(";",$user);
	echo "<tr><td>".$daten[0]."</td><td>".$daten[1]."</td><td>".$daten[2]."</td>";
	echo "<td><form action='bnutzerListe.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input class='interfaceInput' type='submit' value='✎'></form></td><td><form action='scr_deleteuser.php' method='post'><input type='hidden' name='name' value='".$daten[0]."'><input class='interfaceInput' type='submit' value='🗑'></form></td></tr>\n";
}

?>
<tr></tr>
</tbody>
</table>
</div>
</body>
</html>
