<?php
session_start();
include('db_connect.php');
$con = openCon();
if (isset($_SESSION['user']) && $_SESSION['rechte'] == "admin") header("location:startadmin.php");
if (isset($_SESSION['user']) && $_SESSION['rechte'] == "nutzer") header("location:start.php");

$name = $pw = "";
$vergleichRecht = "admin";

if (isset($_POST['name'])) $name = $_POST['name'];
if (isset($_POST['pw']))   $pw = $_POST['pw'];

// Nutzerliste in ein Array einlesen, Zeilenumbrüche entfernen
//$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);

//$found = 0;

    $sql = "SELECT Nutzername FROM user WHERE Nutzername='Hans'";
$res = $con->query($sql);
if($res === true){
    $_SESSION['user'] = $res["Nutzername"];
    $_SESSION['pw'] = $res["Passwort"];
    $_SESSION['rechte'] = $res["Rechte"];
    $_SESSION['salt'] = $res["PwSalt"];
	$rechte = $_SESSION['rechte'];
	if($vergleichRecht == $rechte){
		//auf adminseite
        closeCon($con);
        header("location:startadmin.php");
	}else{       
        closeCon($con);
        header("location:start.php");
	}
}else {
        $_SESSION['error'] = '<font color="#ff2e2e">nutzername oder kennwort inkorrekt.</font> bitte wiederholen.';
        closeCon($con);
		header("location:index.php");
}





// foreach ($users as $user) {
//   // explode zerlegt den String in ein Array, das Trennzeichen ist frei wählbar
//   $daten = explode(";", $user);
//   if ($name == $daten[0] && password_verify($pw.$daten[3], $daten[1])) {
// 	    $_SESSION['pw'] = $daten[1];
//         $_SESSION['rechte'] = $daten[2];
//         $_SESSION['salt'] = $daten[3];
// 		$rechte = $_SESSION['rechte'];
// 	if($vergleichRecht == $rechte){
// 		//auf adminseite
// 		$found = 1;
// 		$_SESSION['user'] = $daten[0];
// 	}else{
//     $found = 2;
//     $_SESSION['user'] = $daten[0];
// 	}
//   }


// }
// switch ($found) {
//     case 0:
//         $_SESSION['error'] = '<font color="#ff2e2e">nutzername oder kennwort inkorrekt.</font> bitte wiederholen.';
//         closeCon($con);
// 		header("location:index.php");
//         break;
//     case 1:
//         closeCon($con);
//         header("location:startadmin.php");
//         break;
//     case 2:
//         closeCon($con);
//         header("location:start.php");
//         break;
// }


?>
