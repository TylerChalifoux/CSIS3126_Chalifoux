<?php
include("global.php");
include("verifyLoggedIn.php");
$coords = mysqli_real_escape_string($connection,$_REQUEST["coords"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1">
        <title>More Information</title>
        <link rel="stylesheet" href="mainStyling.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="map_info.js"></script>
        <style>
            @media only screen and (min-device-width : 640px){
                #map{
                    width:40vw;
                    height:80vh;
                }
            }
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                #map{
                    width:86vw;
                    height:43vh;
                }
            }
            .buttonStyling{
                    border-radius: 50%; 
                    color: yellow;
                    background-color: rgb(234, 153, 153);  
                    font-size: 2vmin;
                    border: 0.05em solid black;
                    margin-top:2vh;
            }
        </style>

    </head>

    <body>
        <div><a href = index.html><img id = logo src = "Icons/Logo.png"></a></div>
		    <div id = topMargin>Find a Loop</div>
        <div>
        <p id = coords style = "display: none"><?php echo $coords; ?></p>

        <div style="margin-right: 3vw; margin-top: 4.5vh; margin-left:3vw; padding-left: 2vw; background-color: lightgrey; ">
            <p id = mapTitle style = "margin-left: 2vw; margin-bottom: 1vh; font-size: 4vmin"></p>
            <img id = map style = "vertical-align:middle; outline: 0.2em solid black;">
            <button id = backHomeButton class = buttonStyling style = "margin-right: 2vw; float:right; padding: 1em; color: yellow;" type="button">Home</button>
            <span id = mapInfo style= "font-size: 6vmin; margin-left: 3vw"></span>
        </div>

    </body>
</html>