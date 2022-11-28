<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="mainStyling.css">
        <title>Search Results</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="search_page.js"></script>

        <style>
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                .map{
                height: 17%;
                width: 17%;
                min-width: 40vw;
                min-height: 20vh;
                border: 0.2em solid black;
                visibility: hidden;
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
                visibility: hidden;
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

        </style>
    
    </head>
    
    <body>
        <div><a href = index.html><img id = logo src = "Icons/Logo.png"></a></div>
		    <div id = topMargin>Find a Loop</div>
        <div>

        <p style = "margin-top: 3vh; margin-left: 1vw; font-size: 3vmin;; margin-bottom: 0vh">Loops near: <button id = backHomeButton class = buttonStyling style = "margin-right: 4vw; float:right; padding: 1em; color: yellow;" type="button">Home</button></p>
        <p style = "margin-right: 30vw; margin-top: 0vh; margin-left: 3.5vw; font-size: 3vmin;" id = searchText><?php echo $_POST["search"]; ?></p>

        <div id = noResults style = "text-align:center; font-size: 3.5vmin; display:none">
            <p  id = noResultsText>Oops.. We couldn't find any Loops in that area. Check your spelling or let's make a new one!</p>
            <img id = noResultsImage src = "Icons/lostWithMap.PNG" style = "width: 40vw; heigh: 40vh"><br>
        </div>

        <div style = "margin-top: 3vh;">
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
            <div class = mapTextCombo>
                <img id = localMap5 class = map><br>
                <span  id = mapText5 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap6 class = map><br>
                <span  id = mapText6 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap7 class = map><br>
                <span  id = mapText7 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap8 class = map><br>
                <span  id = mapText8 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap9 class = map><br>
                <span  id = mapText9 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap10 class = map><br>
                <span  id = mapText10 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap11 class = map><br>
                <span  id = mapText11 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap12 class = map><br>
                <span  id = mapText12 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap13 class = map><br>
                <span  id = mapText13 class = mapText></span>
            </div>
            <div class = mapTextCombo>
                <img id = localMap14 class = map><br>
                <span  id = mapText14 class = mapText></span>
            </div>
        </div>
    </body>
</html>