	<?php
 session_start();
 // Umleitung bei Aufruf ohne Anmeldung
 $oldpw = $newpw = $bnewpw = "";
 
 if (!isset($_SESSION['user'])) header("location:index.php");
 
 
if (isset($_POST['oldpw']))   $oldpw = $_POST['oldpw'];
if (isset($_POST['newpw']))   $newpw = $_POST['newpw'];
if (isset($_POST['bnewpw']))   $bnewpw = $_POST['bnewpw'];

$thisuser = $_SESSION['user'];

$changed = false;

// Nutzerliste in ein Array einlesen, Zeilenumbrüche entfernen
$users = file("include/nutzer.txt",FILE_IGNORE_NEW_LINES);
				
//echo "<pre>"; print_r($users); echo "</pre>";
				
// Die foreach-Schleife ist eine PHP-Spezialität - und sehr bequem
$index = 0;
foreach ($users as $user) {	
	$daten = explode(";", $user);
	if($daten[0] == $thisuser) { 
		if($daten[1] == $oldpw) {
			if($newpw == $bnewpw) {
				$users[$index] = "$thisuser;$newpw";
				file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
				header("Location:pwwurdesaved.php");
				$_SESSION['pwchanged'] = 'Neues Passwort wurde gespeichert.';		
				header("Location:pwchange.php");
			} else { 
						$_SESSION['error'] = 'Eingabe der neuen Kennwörter stimmt nicht überein.';
						header("location:pwchange.php");	
			}
		} else { $_SESSION['error'] = 'Eingabe des alten Passworts inkorrekt.';
						header("location:pwchange.php");
		}
	}
	$index++;
}

//echo "<pre>"; print_r($users); echo "</pre>";



 ?>


