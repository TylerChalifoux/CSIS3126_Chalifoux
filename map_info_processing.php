<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes coordinates and finds all the other information about the route and if the active user has it saved and then sends it back as a JSON file
$coords = mysqli_real_escape_string($connection,$_REQUEST["coords"]);

$data = array();
$temp = array();
$res = mysqli_query($connection,"SELECT * FROM loops where map = '$coords'");
$row = mysqli_fetch_assoc($res);

//Pushes all the map info into our array of information being sent
array_push($data, $row["distance"]);
array_push($data, $row["state"]);
array_push($data, $row["town"]);
array_push($data, $row["id"]);
$mapID = $row["id"];

//Creates another query to get the users map library
$currentId = $_SESSION['userid'];
$res = mysqli_query($connection,"SELECT * FROM users where id = '$currentId'");
$row = mysqli_fetch_assoc($res);
$usersLoops = $row['savedLoops'];

//Loops through the library and adds into the JSON file whether or not the user has the map already saved. Used to auto check the box if the user has the loop saved
$loops= explode(',',$usersLoops);
$counter = 0;
foreach ($loops as $value) {
    if(strcmp(strval($value),$mapID) == 0 ){
        array_push($data,"saved");
        break;
    }else if($counter == count($loops)-1){
        array_push($data, "unsaved");
    }
    $counter = $counter +1;
}

//Sends the JSON file
header('Content-type: application/json');
echo json_encode( $data );
?>