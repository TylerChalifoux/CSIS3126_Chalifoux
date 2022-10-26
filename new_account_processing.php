<?php
include("global.php");

$errorMessage = "";

//-----This whole part is to verify that the username is valid-------
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

//-----This whole part is to verify that the password is valid-------
if ($_POST["topPassInput"] == "" || $_POST["bottomPassInput"] == ""){
	$errorMessage .= "Password is required<br />";
}else{

	//cleans input
	$topPassInput = mysqli_real_escape_string($connection,$_POST["topPassInput"]);
	$bottomPassInput = mysqli_real_escape_string($connection,$_POST["bottomPassInput"]);

	//checks if it matches or isnt long enough
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
	mysqli_query($connection,"INSERT INTO users (username, password) VALUES ('$newUsername','$topPassInput'")or die("Unable to add");
	echo"Account created with username: ". $newUsername. " and password: ". $topPassInput;
}
?>