<?php
//Creates connection with database, starts a user session, and if sent the correct variable, will end the users session
$connection = mysqli_connect("mysql.tchalifoux.jwuclasses.com","tchalifoux","!jVx55n3","tchalifoux") or die("Unable to connect to database");

session_start();

$signout = mysqli_real_escape_string($connection,$_REQUEST["signout"]);
if($signout == "true"){
    session_destroy();
}
?>

