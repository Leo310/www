<?php
	session_start();
if(isset($_SESSION['user'])) header("location:start.php");
$name = $pw = $bpw = "";
$rechte = "nutzer";
if(isset($_POST['name'])) $name=$_POST['name'];
if(isset($_POST['pw'])) $pw =$_POST['pw'];	
if(isset($_POST['bpw'])) $bpw =$_POST['bpw'];


$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);


foreach($users as $user){
	$daten = explode(";",$user);
	if($daten[0] == $name){
		$_SESSION['error'] = '<font color="#d1323c">Dieser Benutztername exsistiert schon.</font> Wählen sie einen anderen.';
		$existent = true;
		header("location:register.php");
	}	else{
		$existent = false;
	}
}
if(!$existent){
	if($pw == $bpw){	
	file_put_contents("include/nutzer.txt", "$name;$bpw;$rechte\n", FILE_APPEND);
	$_SESSION['user'] = $name;
	header("location:start.php");
	
}else{
	$_SESSION['error1'] = '<font color="#d1323c">Eingabe der Passwörter stimmt nicht überein.</font> Bitte wiederholen.';
	header("location:register.php");
}
}



?>