<?php
include("verifyLoggedIn.php");
include("global.php");

//Gets all the information about the user, map, and what we are doing
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

//This function takes 3 parameters: If your saving or deleting, your current map library, and the map in question. It then returns a new, correct map library
function makeNewLoopString($status,$newLoopString,$mapid){
    if($status == "saved"){
        $newLoopString.=$mapid;
        $newLoopString.=',';
    }
    if($status == "unsaved"){
        //explode breaks the string into an array; separated by the commas
        $loops=(explode(',',$newLoopString));
        $newLoopString = "";
        $counter = 0;
        //Loop through the array and add it into another array as long as it's not the map in question
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
    //return the coordinate string
    return $newLoopString;
}

//If we are saving, check to make sure its not in there already, and add it. If we are deleting, make sure it is there and remove it.
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