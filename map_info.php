<?php
include("global.php");
include("verifyLoggedIn.php");
//gets the coordinates
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

        <!--Styling for desktop and mobile -->
        <style>
            @media only screen and (min-device-width : 640px){
                #map{
                    width:40vw;
                    height:80vh;
                }
                #mapInfo{
                    padding-top:20vh;
                    margin-left: 45vw; 
                    width:35vw;
                }
                #isLiked{
                    width: 3vw;
                    height: 3vh;
                    border-radius: 15px;
                    margin-top: 5vh;
                    margin-left:45vw;
                }
                #bottomBox{
                    padding-bottom:40vh;
                }
                #footer{
                    margin-top: 5vh; 
                }
            }
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                #map{
                    width:86vw;
                    height:43vh;
                }
                #mapInfo{
                    margin-top:50vh;
                    padding-bottom:1vh;
                }
                #isLiked{
                    width: 3vw;
                    height: 3vh;
                    border-radius: 15px;
                    margin-top: 3vh;
                }
                #bottomBox{
                    padding-bottom:5vh;
                }
                #footer{
                    display: none;
                }
            }
            .buttonStyling{
                    border-radius: 50%; 
                    color: yellow;
                    background-color: rgb(234, 153, 153);  
                    font-size: 2vmin;
                    border: 0.05em solid black;
                    margin-top:0vh;
                    margin-right: 2vw;
                    float: right;
                    padding: 1em;
                    color: yellow;
                    margin-bottom:5vh;
            }
        </style>

    </head>

    <body>
        <div><a href = index.php><img id = logo src = "Icons/Logo.png"></a></div>
		    <div id = topMargin>Find a Loop</div>
        <div>
        <!--Pastes the coords but hides it, used in the JS file -->
        <p id = coords style = "display: none"><?php echo $coords; ?></p>

        <!--Large map, checkbox and preset text. All set from the JS file -->
        <div style="margin-right: 3vw; margin-top: 4.5vh; margin-left:3vw; padding-left: 2vw; background-color: lightgrey;">
            <p id = mapTitle style = "padding-top:2.5vh; margin-left: 2vw; margin-bottom: 0.5vh; font-size: 4vmin"></p>
            <button id = backHomeButton class = buttonStyling type="button">Back</button><br>
            <img id = map style = "position: absolute; float:left; outline: 0.2em solid black; margin-top:3vh">
            <div id= mapInfo style= "font-size: 7vmin;"></div>
            <div id = bottomBox>
                <input id= isLiked type="checkbox"></input>
                <label for="isLiked" style = "font-size: 3vmin"> Save Loop</label><br>
            </div>
        </div>
        <?php include("footer.html"); ?>
    </body>
</html>