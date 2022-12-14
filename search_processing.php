<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes a town and state and produces a JSON file with all the loops in it
$search = mysqli_real_escape_string($connection,$_REQUEST["search"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where town LIKE '$search'");

$numOfMaps = 0;
while ($row = mysqli_fetch_assoc($res)) {
    //Pushes the loop info into a temp array
    $numOfMaps++;
    array_push($temp, $row["map"]);
    array_push($temp, $row["distance"]);
    array_push($temp, $row["town"]);
    array_push($temp, $row["state"]);
    array_push($data, $temp);
    $temp = array();
}
array_push($data, $numOfMaps);

//Sends a JSON file with an array of Loops. Each loop has it's important information. Also has the number of loops being sent
header('Content-type: application/json');
echo json_encode( $data );

?>