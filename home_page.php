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
        <script type="text/javascript" src="home.js"></script>

        <!-- Styling for both mobile and desktop-->
        <style>
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                #homePagePhoto{
                    height: 20%;
                }
                #searchBar{
                    margin-top: 10vh;
                    font-size: 90%;
                    width:70%; 
                }
                #div1{
                position: relative;
                margin-top: 8vh;
                font-size: 5vmin; 
                }
                .map{
                height: 17%;
                width: 17%;
                min-width: 40vw;
                min-height: 20vh;
                border: 0.2em solid black;
                visibility: hidden;
                }
                #localMap4{
                    display: none;
                }
                #mapText4{
                    display: none;
                }
                .mapTextCombo{
                float:left;
                width: 17%;
                min-width: 40vw;
                margin-left:3.5vw;
                margin-right:3.5vw;
                }
                #stopwatchImage{
                    position: absolute;
                    height:5vh;
                    width:8vw;
                    margin-left:73vw;
                    margin-top:2vh;
                }
                #stopwatchLink{
                    display: block;
                    position: absolute;
                    height:5vh;
                    width:7vw;
                    margin-left:73vw;
                    margin-top:2vh;
                }
                #profileImage{
                    position: absolute;
                    height:5vh;
                    width:8vw;
                    margin-left:84vw;
                    margin-top:2vh;
                }
                #profileLink{
                    display: block;
                    position: absolute;
                    height:5vh;
                    width:7.5vw;
                    margin-left:84vw;
                    margin-top:2vh;
                }
                #stopwatchText{
                    display: none;
                }
                #profileText{
                    display: none;
                }
                #footer{
                    display:none;
                }
            }
            @media only screen and (min-device-width : 640px){
                #stopwatchImage{
                    position: absolute;
                    height:5vh;
                    width:5vw;
                    margin-left:78vw;
                    margin-top:3vh;
                }
                #stopwatchLink{
                    display: block;
                    position: absolute;
                    height:8vh;
                    width:7vw;
                    margin-left:77vw;
                    margin-top:3vh;
                }
                #profileImage{
                    position: absolute;
                    height:5vh;
                    width:3vw;
                    margin-left:90vw;
                    margin-top:3vh;
                }
                #profileLink{
                    display: block;
                    position: absolute;
                    height:8vh;
                    width:8vw;
                    margin-left:88vw;
                    margin-top:3vh;
                }
                #homePagePhoto{
                    height: 40%;
                }
                #searchBar{
                    margin-top: 19vh;
                    font-size: 140%;
                    width:60%; 
                }
                #div1{
                position: relative;
                margin-top: 18vh;
                font-size: 3vmin; 
                }
                .map{
                height: 17%;
                width: 17%;
                min-width: 18vw;
                min-height: 18vh;
                border: 0.2em solid black;
                visibility: hidden;
                }
                
                .mapTextCombo{
                float:left;
                width: 17%;
                min-width: 15vw;
                margin-left:  1.2vw;
                margin-right: 1.2vw;
                }
                #footer{
                    margin-top: 45vh; 
                }
            }
            body{
                background: lightgray !important;
            }
            .mapText{
                font-size: large;
                visibility: hidden;
                float:left;
            }

        </style>
    </head>
    
    <!--Below is for the top margin area including the profile and log a run button and the search bar-->
    <body>
        <div><a href = index.php><img id = logo src = "Icons/Logo.png"></a></div>

        <img id = stopwatchImage src = "Icons/runningIcon.png">
        <label id = stopwatchText style = "position: absolute; margin-right: 15vw; margin-left: 77vw; margin-top: 8vh; font-size: 3vmin">Log a Loop</label>
        <a id = stopwatchLink href = stopwatch_page.php></a>

        <img id = profileImage src = "Icons/profileIcon.png">
        <label id = profileText style = "position: absolute; margin-left: 88vw; margin-top: 8vh; font-size: 3vmin">Your Profile</label>
        <a id = profileLink href = profile_page.php></a>

		<div id = topMargin>Find a Loop</div>
        <div>
            <img id = homePagePhoto src = "Icons/runnerHomePage.PNG" style="width: 99%; position: absolute; z-index: -1;">
            <form action="search_page.php" method="POST">
                <input type="hidden" id = defaultSearch name="defaultSearch">
                <center><input id = searchBar style="height: 10%; border-radius: 50px; text-align: center;" placeholder="Search for a loop in your town or city" name = "search"></center>
            </form>

    <!--below is for the maps on the page. The images are all blank until set by the JS file-->
        </div>
        <div id = div1>
            <span id = locationText style="margin-left: 5%;"></span>
            <div style = "margin-top: 1vh;">
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
            </div>
        </div>
        <?php include("footer.html"); ?>
    </body>
</html>
