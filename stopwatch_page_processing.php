<?php
include("global.php");

$town = $_REQUEST["town"];
$state = $_REQUEST["state"];
$coords = $_REQUEST["coords"];
$distance = $_REQUEST["distance"];

mysqli_query($connection,"INSERT INTO loops (town, state, distance, map) VALUES ('$town','$state','$distance','$coords')")or die("Unable to add");
?>