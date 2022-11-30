<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes a town and state and produces a JSON file with all the loops in it
$town = mysqli_real_escape_string($connection,$_REQUEST["town"]);
$state = mysqli_real_escape_string($connection,$_REQUEST["state"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where town = '$town'");

$numOfMaps = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $numOfMaps++;
    array_push($temp, $row["map"]);
    array_push($temp, $row["distance"]);
    array_push($data, $temp);
    $temp = array();
}
array_push($data, $numOfMaps);

header('Content-type: application/json');
echo json_encode( $data );

?>