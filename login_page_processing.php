<?php
ob_start();
include("global.php");

$loginPageError = "";

//checks for empty submission
if ($_POST["enteredUsername"] == ""){
	$loginPageError .= "Username is required<br />";
}
if ($_POST["enteredPassword"] == ""){
    $loginPageError .= "Password is required<br />";
}

//If empty, go back to the login page with an updated error message
if($loginPageError != ""){
	include ("login_page.php");
	die();
}

//clean data
$username = mysqli_real_escape_string($connection,$_POST["enteredUsername"]);
$password = mysqli_real_escape_string($connection,$_POST["enteredPassword"]);


//Search for account
$res = mysqli_query($connection,"SELECT * FROM users WHERE username = '$username'");
$row = mysqli_fetch_assoc($res);

//No account found
if($row ==0){
    $loginPageError .= "Username not found <br />";
    include ("login_page.php");
    die();
//Hashs password, checks if it's right
}else if($row["password"] != hash('sha256',$password)){
    $loginPageError .= "Incorrect Password <br />";
    include ("login_page.php");
    die();
}else{
    $_SESSION["userid"] = $row["id"];
    header("Location: home_page.php");
    ob_end_clean();
    exit();
}
?>