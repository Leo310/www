<?php
session_start();
if (isset($_SESSION['user'])) header("location:index.php");

$uname = $_SESSION['user'];
$pw = "";

if (isset($_POST['pw']))   $pw = $_POST['pw'];


$users = file("include/nutzer.txt", FILE_IGNORE_NEW_LINES);

$index = 0;
$delete = -1;



// löschvorgang
foreach($users as $user) {
	$daten = explode(";", $user);
	if ($uname == $daten[0]) $delete = $index;
	$index++;


	if ($pw == $daten[1]) {

		unset($users[$delete]);
		file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));


		session_destroy();
		header("location:index.php");
} else {
$_SESSION['error4'] = '<font color="#ff2e2e">kennwort inkorrekt.</font> bitte wiederholen.';
header("location:deleteuser.php");

}
}
?>
