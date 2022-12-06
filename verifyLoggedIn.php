<?php
//This file checks if a user is logged in. If they are not, it brings them back to the index page
ob_start();
include("global.php");
if($_SESSION['userid'] == ''){
    header("Location: index.html");
    exit();
}
ob_end_flush();
?>
<?php