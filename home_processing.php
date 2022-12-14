<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes a town and state and produces a JSON file with all the loops from that area
$town = mysqli_real_escape_string($connection,$_REQUEST["town"]);
$state = mysqli_real_escape_string($connection,$_REQUEST["state"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where town = '$town'");

//Loop through the query, add the coordinates and distance into a temp array, push that temp array into the data array, increment number of loops
$numOfMaps = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $numOfMaps++;
    array_push($temp, $row["map"]);
    array_push($temp, $row["distance"]);
    array_push($data, $temp);
    $temp = array();
}
array_push($data, $numOfMaps);

//Send a JSON file. This file has an array of Loops. Each Loop has coordinates and a distance. The last index in the array is the amount of Loops in the array
header('Content-type: application/json');
echo json_encode( $data );

?>