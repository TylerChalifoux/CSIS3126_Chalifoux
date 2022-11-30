<?php
include("verifyLoggedIn.php");
include("global.php");

$town = $_REQUEST["town"];
$state = $_REQUEST["state"];
$coords = $_REQUEST["coords"];
$distance = $_REQUEST["distance"];

mysqli_query($connection,"INSERT INTO loops (town, state, distance, map) VALUES ('$town','$state','$distance','$coords')")or die("Unable to add");
$res = mysqli_query($connection,"SELECT * FROM loops where map = '$coords'");
//Here we will take the current string of loops the user has, add our new loop. and reinsert it into the users database
?>