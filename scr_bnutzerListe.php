<?php
session_start();
$name = $newname = $newpw = $newrechte = "";

if(isset($_POST['name'])) $name = $_POST['name'];
if(isset($_POST['newname'])) $newname = $_POST['newname'];
if(isset($_POST['newpw'])) $newpw = $_POST['newpw'];	
if(isset($_POST['newrechte'])) $newrechte = $_POST['newrechte'];


$users = file("include/nutzer.txt", FILE_IGNORE_NEW_LINES);

$index = 0;
$delete = -1;
		
foreach($users as $user){
	$daten = explode(";",$user);
	if($newrechte == "admin"  || $newrechte == "nutzer"){
	if ($name == $daten[0]){
	$users[$index] = "$newname;$newpw;$newrechte";
	file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
}
}else{
	$_SESSION['error2'] = "Geben sie bei den Rechten entweder admin oder nutzer ein.";
	header("location:nutzerListe.php");
}	
	$index++;

}

header("location:nutzerListe.php");


?>