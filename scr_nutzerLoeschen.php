<?php
session_start();
include("include/inc_htmlhead");

$name = $_POST['name'];

$users = file("include/nutzer.txt");

$index = 0;
$delete = -1;

foreach($users as $user) {
	$daten = explode(";", $user);
	if ($name == $daten[0]) $delete = $index;
	$index++;
}

unset($users[$delete]);
file_put_contents("include/nutzer.txt", $users);

header("location:nutzerListe.php");
?>

