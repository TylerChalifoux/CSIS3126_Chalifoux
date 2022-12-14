<?php
//This file checks if a user is logged in. If they are not, it brings them back to the index page
//It is to be included on the top of any page that requires a user to be signed in for
//ob_start() and ob_end_clean() are to stop this page from loading which allows header to be used
ob_start();
include("global.php");
if($_SESSION['userid'] == ''){
    header("Location: index.php");
    exit();
}
ob_end_flush();
?>
<?php