<?php
include("verifyLoggedIn.php");
include("global.php");

//Gets all the information about the user and the map
$currentId = $_SESSION['userid'];
$status = mysqli_real_escape_string($connection,$_REQUEST["status"]);
$mapid = mysqli_real_escape_string($connection,$_REQUEST["id"]);

$res = mysqli_query($connection,"SELECT * FROM users where id = '$currentId'");
$row = mysqli_fetch_assoc($res);
$usersLoops = $row['savedLoops'];

//This function loops through the users library to see if the map is already there. Used to prevent duplicates or attempting to delete nothing. Returns true if found
function checkIfAlreadySaved($usersLoops,$mapid){
    $loops= explode(',',$usersLoops);
    foreach ($loops as $value) {
        if(strcmp(strval($value),$mapid) == 0 ){
            return true;
            break;
        }
    }
    return false;
}

//This function takes 3 parameters: If your saving or unsaving, your current map libary, and the map in question. It then returns a new, correct map library
function makeNewLoopString($status,$newLoopString,$mapid){
    if($status == "saved"){
        $newLoopString.=$mapid;
        $newLoopString.=',';
    }
    if($status == "unsaved"){
        $loops=(explode(',',$newLoopString));
        $newLoopString = "";
        $counter = 0;
        foreach ($loops as $value) {
            if(strcmp(strval($value),$mapid) != 0 ){
                $newLoopString.=$value;
                if($counter != count($loops)-1){
                    $newLoopString.=',';
                }
            }
            $counter = $counter +1;   
        }
    }
    return $newLoopString;
}

//If we are saving, check to make sure its not in there already, and add it. If we are unsaving, make sure it is there and remove it.
if($status == "saved"){
    if(!checkIfAlreadySaved($usersLoops,$mapid)){
        $newLoopString = makeNewLoopString($status,$usersLoops,$mapid);
        mysqli_query($connection,"UPDATE users SET savedLoops = '$newLoopString' WHERE users.id = '$currentId'") or die("Unable to edit");
    }
}else if($status == "unsaved"){
    if(checkIfAlreadySaved($usersLoops,$mapid)){
        $newLoopString=makeNewLoopString($status,$usersLoops,$mapid);
        mysqli_query($connection,"UPDATE users SET savedLoops = '$newLoopString' WHERE users.id = '$currentId'") or die("Unable to edit");
    }
}
?>