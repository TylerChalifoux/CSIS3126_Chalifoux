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
array_push($data, $numOfMaps);

header('Content-type: application/json');
echo json_encode( $data );


?>