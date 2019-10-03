<?php
session_start();
include("include/inc_htmlhead");

?>

<h1>nutzerliste</h1>
<div style='margin-left:auto; margin-right:auto; margin-top:150px; min-width:500px; width:50%;'>
<table>
<thead>
<tr><th>Nutzername</th><th>Passwort</th><th>Rechte</th></tr>
</thead>
<tbody>
<?php
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
foreach($users as $user){
	$name = $_POST['name'];
	$daten = explode(";",$user);
	if($name == $daten[0]){
		echo "<tr><td><form action='scr_bnutzerListe.php' method='post'><input type='hidden' name='name' value='$name'><input type='text' id='nutzername' name='newname' placeholder='".$daten[0]."'></td><td><input type='text' id='password' name='newpw' placeholder='".$daten[1]."'></td><td><input type='text' id='rechte' name='newrechte' placeholder='".$daten[2]."'><input type='submit' value='✓'></td></tr>\n";	
	}else{
	echo "<tr><td>".$daten[0]."</td><td>".$daten[1]."</td><td>".$daten[2]."</td><td>\n";	
	}
	}

?>
<tr></tr>
</tbody>
</table>
</div>
</body>
</html>