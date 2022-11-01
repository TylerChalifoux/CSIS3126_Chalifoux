<?php
include("global.php");

$loginPageError = "";

//checks for empty submission
if ($_POST["enteredUsername"] == ""){
	$loginPageError .= "Username is required<br />";
}
if ($_POST["enteredPassword"] == ""){
    $loginPageError .= "Password is required<br />";
}

if($loginPageError != ""){
	include ("index.php");
	die();
}

//clean data
$username = mysqli_real_escape_string($connection,$_POST["enteredUsername"]);
$password = mysqli_real_escape_string($connection,$_POST["enteredPassword"]);


//Search for account

$res = mysqli_query($connection,"SELECT * FROM users WHERE username = '$username'");
$row = mysqli_fetch_assoc($res);

if($row ==0){
    $loginPageError .= "Username not found <br />";
    include ("index.php");
    die();
}else if($row["password"] != $password){
    $loginPageError .= "Incorrect Password <br />";
    include ("index.php");
    die();
}else{
    //$_SESSION["userid"] = $row["id"];
    header("Location: new_account_page.php");
    exit();
}
?>