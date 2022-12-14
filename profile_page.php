<?php
include("verifyLoggedIn.php");
?>
<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="mainStyling.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="profile_page.js"></script>
        
        <!--Styling for desktop and mobile-->
        <style>
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                .map{
                    height: 17%;
                    width: 17%;
                    min-width: 40vw;
                    min-height: 20vh;
                    border: 0.2em solid black;
                    display: none;
                }
                .mapTextCombo{
                    float:left;
                    width: 17%;
                    min-width: 40vw;
                    margin-left:3.5vw;
                    margin-right:3.5vw;
                }
                .mapText{
                    font-size: large;
                    visibility: hidden;
                    float:left;
                }
            }
            @media only screen and (min-device-width : 640px){
                .map{
                    height: 17%;
                    width: 17%;
                    min-width: 30vw;
                    min-height: 30vh;
                    border: 0.2em solid black;
                    display: none;
                }
                
                .mapTextCombo{
                    float:left;
                    width: 30%;
                    min-width: 15vw;
                    margin-left:  1.2vw;
                    margin-right: 1.2vw;
                    margin-bottom: 4.5vh;
                }
                .mapText{
                    font-size: 3vmin;
                    visibility: hidden;
                    float:left;
                }
            }
            .buttonStyling{
                border-radius: 50%; 
                color: yellow;
                background-color: rgb(234, 153, 153);  
                font-size: 0.5em;
                border: 0.05em solid black;
            }
            #footer{
                display:none;
            }
        </style>
    </head>

    <body>
        <!--Top margin-->
        <div><a href = index.php><img id = logo src = "Icons/Logo.png"></a></div>
            <div id = topMargin>Find a Loop</div>
        <div>
        <p style = "margin-top: 3vh; margin-left: 1vw; font-size: 3vmin;; margin-bottom: 0vh">Your saved Loops: 
            <button id = backHomeButton class = buttonStyling style = "margin-right: 4vw; float:right; padding: 1em; color: yellow;" type="button">Home</button>
            <button id = signOutButton class = buttonStyling style = "margin-right: 5vw; float:right; padding: 1em; color: yellow;" type="button">Sign Out</button>
        </p>
        </div>
        <!--Only shown if nothing is saved-->
        <div id = noResults style = "text-align:center; font-size: 3.5vmin; display:none">
            <p  id = noResultsText>Looks like you don't have any saved loops. Let's find or make some!</p>
            <img id = noResultsImage src = "Icons/noSavedLoopsImage.jpg" style = "width: 50vw; heigh: 40vh"><br>
        </div>

        <!--Shows all the users loops-->
        <div style = "margin-top: 3vh; margin-bottom: 30vh;">
            <div class = mapTextCombo>
                <a id = mapURL0><img id = localMap0 class = map><br></a>
                <span  id = mapText0 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL1><img id = localMap1 class = map><br></a>
                <span  id = mapText1 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL2><img id = localMap2 class = map><br></a>
                <span  id = mapText2 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL3><img id = localMap3 class = map><br></a>
                <span  id = mapText3 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL4><img id = localMap4 class = map><br></a>
                <span  id = mapText4 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL5><img id = localMap5 class = map><br></a>
                <span  id = mapText5 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL6><img id = localMap6 class = map><br></a>
                <span  id = mapText6 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL7><img id = localMap7 class = map><br></a>
                <span  id = mapText7 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL8><img id = localMap8 class = map><br></a>
                <span  id = mapText8 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL9><img id = localMap9 class = map><br></a>
                <span  id = mapText9 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL10><img id = localMap10 class = map><br></a>
                <span  id = mapText10 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL11><img id = localMap11 class = map><br></a>
                <span  id = mapText11 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL12><img id = localMap12 class = map><br></a>
                <span  id = mapText12 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL13><img id = localMap13 class = map><br></a>
                <span  id = mapText13 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <a id = mapURL14><img id = localMap14 class = map><br></a>
                <span  id = mapText14 class = mapText></span>
            </div>
        </div>
        <?php include("footer.html"); ?>
    </body>
</html>