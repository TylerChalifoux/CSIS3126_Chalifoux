<?php
include("global.php");

$errorMessage = "";

if ($_POST["username"] == "")
	$errorMessage .= "Username is required<br />";

if ($errorMessage != "") {
	include("new_account_page.php");
	die();
}
header("Location: index.php");
?>