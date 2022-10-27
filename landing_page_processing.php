<?php
include("global.php");

$loginPageMessage = "";

//checks for empty submission
if ($_POST["enteredUsername"] == ""){
	$loginPageMessage .= "Username is required<br />";
}
if ($_POST["enteredPassword"] == ""){
    $loginPageMessage .= "Password is required<br />";
}

if($loginPageMessage != ""){
	include ("index.php");
	die();

//clean data
$username = mysqli_real_escape_string($connection,$_POST["enteredUsername"]);
$password = mysqli_real_escape_string($connection,$_POST["enteredPassword"]);

//Search for account
$res = mysqli_query($connection,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");
$row = mysqli_fetch_assoc($res);

if($row ==0){
    $loginPageMessage .= "Username  or password is invalid <br />";
    include ("index.php");
    die();
}else{
    $_SESSION["userid"] = $row["id"];
    <?php header("Location: https://www.google.com/"); ?>
}

?>