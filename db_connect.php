<?php

function openCon() {
    $srvname = "localhost";
    $dbname = "website";
    $user = "root";
    $pw = "ddaqBjHh17xraubD";

    $con = new mysqli($srvname, $user, $pw, $dbname) or die("Couldnt connect:  " . $con->connect_error);

    return $con;
}

function closeCon($con){
    $con->close();
}
?>