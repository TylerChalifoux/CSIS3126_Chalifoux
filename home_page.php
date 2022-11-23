<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="mainStyling.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="home.js"></script>

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
            }
            @media only screen and (min-device-width : 640px){
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

    <body>
        <div><a href = index.html><img id = logo src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>
        <div>
            <img id = homePagePhoto src = "Icons/runnerHomePage.PNG" style="width: 100%; position: absolute; z-index: -1;">
            <center><input id = searchBar style="height: 10%; border-radius: 50px; text-align: center;" placeholder="Search for a loop in your town or city"></center>
        </div>
        <div id = div1>
            <span id = locationText style="margin-left: 5%;"></span>
            <div style = "margin-top: 1vh;">


                <div class = mapTextCombo>
                    <img id = localMap0 class = map><br>
                    <span  id = mapText0 class = mapText></span>
                </div>
                <div class = mapTextCombo>
                    <img id = localMap1 class = map><br>
                    <span  id = mapText1 class = mapText></span>
                </div>
                <div class = mapTextCombo>
                    <img id = localMap2 class = map><br>
                    <span  id = mapText2 class = mapText></span>
                </div>
                <div class = mapTextCombo>
                    <img id = localMap3 class = map><br>
                    <span  id = mapText3 class = mapText></span>
                </div>
                <div class = mapTextCombo>
                    <img id = localMap4 class = map><br>
                    <span  id = mapText4 class = mapText></span>
                </div>

            </div>
            <br>
            <div id = stopwatchLinkHome><a href = stopwatch_page.html><img src = "Icons/runningIcon.png" style="height: 5em;"></a>Log Run</div>
        </div>
    </body>

</html>
