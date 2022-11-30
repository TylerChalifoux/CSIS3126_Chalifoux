<?php
include("verifyLoggedIn.php");
include("global.php");

$town = mysqli_real_escape_string($connection,$_REQUEST["town"]);
$state = mysqli_real_escape_string($connection,$_REQUEST["state"]);
$coords = mysqli_real_escape_string($connection,$_REQUEST["coords"]);
$distance = mysqli_real_escape_string($connection,$_REQUEST["distance"]);

//Add loop to the loops database for others to see
mysqli_query($connection,"INSERT INTO loops (town, state, distance, map) VALUES ('$town','$state','$distance','$coords')")or die("Unable to add");



//Find the loop that was just added, get the ID, add a comma to the front for CSV
$res = mysqli_query($connection,"SELECT * FROM loops where map = '$coords'");
$row = mysqli_fetch_assoc($res);
$newLoop = $row["id"].',';
$savedLoops = "";



//Gets the user's current loops. Adds the new loop in to there saved loops
$currentId = $_SESSION['userid'];
$res = mysqli_query($connection,"SELECT * FROM users where id = '$currentId'");
$row = mysqli_fetch_assoc($res);
if($row['savedLoops']==''){
    $savedLoops = $newLoop;
}else{
    $savedLoops = $row['savedLoops'].$newLoop;
}

mysqli_query($connection,"UPDATE users SET savedLoops = '$savedLoops' WHERE users.id = '$currentId'") or die("Unable to edit");
?>