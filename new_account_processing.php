<?php
include("global.php");

$errorMessage = "";

//Check if username is blank, update error message and send back if it is
if ($_POST["newUsername"] == ""){
	$errorMessage .= "Username is required<br />";
}else{

	//cleans input
	$newUsername = mysqli_real_escape_string($connection,$_POST["newUsername"]);
	
	//query all users where the username is the same as the one entered, get the row
	$res = mysqli_query($connection,"SELECT * FROM users WHERE username = '$newUsername'");
	$row = mysqli_fetch_assoc($res);

	//if the query got a row, update the error message
	if($row !=0){
		$errorMessage .= "Username is taken <br />";
	}

	//checks if too short
	if(strlen($newUsername) <5){
		$errorMessage .= "Username is too short<br />";
	}
}

//Checks if either top or bottom password are blank. Updates error message
if ($_POST["topPassInput"] == "" || $_POST["bottomPassInput"] == ""){
	$errorMessage .= "Password is required<br />";
}else{

	//cleans input
	$topPassInput = mysqli_real_escape_string($connection,$_POST["topPassInput"]);
	$bottomPassInput = mysqli_real_escape_string($connection,$_POST["bottomPassInput"]);

	//checks if it matches or is not long enough
	if($topPassInput != $bottomPassInput){
		$errorMessage .= "Passwords must match<br />";
	}
	if(strlen($topPassInput) <8 || strlen($bottomPassInput) <8){
		$errorMessage .= "Password is too short<br />";
	}
}

//if anything flagged, go back to create an account, if not create a new account
if($errorMessage != ""){
	include ("new_account_page.php");
	die();
}else{
	//hash password and insert into database. Redirect to login page
	$topPassInput = hash('sha256',$topPassInput);
	mysqli_query($connection,"INSERT INTO users (username, password) VALUES ('$newUsername','$topPassInput')")or die("Unable to add");
	$loginPageMessage = "Account created, sign in now!";
	include ("login_page.php");
}
?>