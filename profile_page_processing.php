<?php
include("verifyLoggedIn.php");
include("global.php");

//This file takes a user ID and gives back all the saved loops the user has
$data = array();
$temp = array();
$currentId = $_SESSION['userid'];
$res = mysqli_query($connection,"SELECT * FROM users where id = '$currentId'");

$numOfMaps = 0;
$row = mysqli_fetch_assoc($res);
$usersLoops = $row['savedLoops'];

$loopIds = explode(',',$usersLoops);
    //Go through each of the loops saved, get all the information for it, add it into it's own array
    foreach ($loopIds as $value) {
        if($value != ""){
            $res = mysqli_query($connection,"SELECT * FROM loops where id = '$value'");
            $row = mysqli_fetch_assoc($res);
            array_push($temp, $row["map"]);
            array_push($temp, $row["distance"]);
            array_push($temp, $row["town"]);
            array_push($temp, $row["state"]);
            array_push($data, $temp);
            $temp = array();
            $numOfMaps++;
        }
    }
    //Push the number of loops
array_push($data, $numOfMaps);

//Send an array of Loops. Each loops has all the information about them
header('Content-type: application/json');
echo json_encode( $data );


?>