<?php
include("global.php");

//This file takes a town and state and produces a JSON file with all the loops in it
$search = mysqli_real_escape_string($connection,$_REQUEST["search"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where town LIKE '$search'");

$numOfMaps = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $numOfMaps++;
    array_push($temp, $row["map"]);
    array_push($temp, $row["distance"]);
    array_push($temp, $row["town"]);
    array_push($temp, $row["state"]);
    array_push($data, $temp);
    $temp = array();
}
array_push($data, $numOfMaps);

header('Content-type: application/json');
echo json_encode( $data );

?>