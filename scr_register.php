<?php
	session_start();
if(isset($_SESSION['user'])) header("location:start.php");
$name = $pw = $bpw = "";
$rechte = "nutzer";
$existent = false;

$_SESSION['rechte'] = $rechte;

if(isset($_POST['name'])) $name=$_POST['name'];
if(isset($_POST['pw'])) $pw =$_POST['pw'];
if(isset($_POST['bpw'])) $bpw =$_POST['bpw'];


$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);


foreach($users as $user){
	$daten = explode(";",$user);
	if($daten[0] == $name){
		$_SESSION['error'] = '<font color="#ff2e2e">dieser nutzername wird bereits verwendet.</font> wähle bitte einen anderen.';
		$existent = true;
	}
}

if(!$existent){
	if($pw == $bpw){
	$userarray = array($name, password_hash($pw, PASSWORD_DEFAULT), $rechte);
	$user = implode(";", $userarray);
	file_put_contents("include/nutzer.txt", "\n".$user, FILE_APPEND);
	$_SESSION['user'] = $name;
	header("location:start.php");

}else{
	$_SESSION['error1'] = '<font color="#ff2e2e">eingabe der passwörter stimmt nicht überein.</font> bitte wiederholen.';
	header("location:register.php");
}
} else {
	header("location:register.php");
}



?>
