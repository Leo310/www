<?php
session_start();
$name = $newname = $newpw = $newrechte = "";

if(isset($_POST['name'])) $name = $_POST['name'];
if(isset($_POST['newname'])) $newname = $_POST['newname'];
if(isset($_POST['newpw'])) $newpw = $_POST['newpw'];	
if(isset($_POST['newrechte'])) $newrechte = $_POST['newrechte'];


$users = file("include/nutzer.txt");

$index = 0;
$delete = -1;
		
foreach($users as $user){
	$daten = explode(";",$user);
	if($daten[2] == "admin"  || $daten[2] == "nutzer"){
	if ($name == $daten[0]) $delete = $index;
	$index++;
	if($daten[0] == $name){
	unset($users[$delete]);
	file_put_contents("include/nutzer.txt", $users);
	file_put_contents("include/nutzer.txt", "$newname;$newpw;$newrechte\n",FILE_APPEND);
	}
}else{
	$_SESSION['error2'] = "Geben sie bei den Rechten entweder admin oder nutzer ein.";
	header("location:nutzerListe.php");
}	
}

header("location:nutzerListe.php");




?>