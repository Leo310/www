<?php
session_start();
if (isset($_SESSION['user'])) header("location:index.php");
$uname = $_SESSION['user'];

$users = file("include/nutzer.txt", FILE_IGNORE_NEW_LINES);

$index = 0;
$delete = -1;

foreach($users as $user) {
	$daten = explode(";", $user);
	if ($uname == $daten[0]) $delete = $index;
	$index++;
}

unset($users[$delete]);
file_put_contents("include/nutzer.txt", implode(PHP_EOL, $users));
 

session_destroy();
header("location:index.php");
?>