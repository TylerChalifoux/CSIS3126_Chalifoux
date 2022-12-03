<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes coordinates and finds all the other information about the route, sends it back as a JSON file
$coords = mysqli_real_escape_string($connection,$_REQUEST["coords"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where map = '$coords'");
$row = mysqli_fetch_assoc($res);

array_push($data, $row["distance"]);
array_push($data, $row["state"]);
array_push($data, $row["town"]);

header('Content-type: application/json');
echo json_encode( $data );
?>