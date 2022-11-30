<?php
ob_start();
include("global.php");
if($_SESSION['userid'] == ''){
    header("Location: index.html");
    exit();
}
ob_end_flush();
?>
<?php