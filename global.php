<?php
//Creates connection with database
$connection = mysqli_connect("mysql.tchalifoux.jwuclasses.com","tchalifoux","!jVx55n3","tchalifoux") or die("Unable to connect to database");

//States a session with the User
session_start();

//If a POST request is sent to this file with the variable signout equal to true, it ends the session
$signout = mysqli_real_escape_string($connection,$_REQUEST["signout"]);
if($signout == "true"){
    session_destroy();
}
?>

