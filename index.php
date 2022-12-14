<!DOCTYPE html>
<html>
	<head>
        <title> Find a Loop </title>
		<link rel="stylesheet" href="mainStyling.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="index.js"></script>

        <!--For mobile and desktop styling-->
        <style>
            @media only screen and (min-device-width : 640px){
                .topButtons{
                    position: absolute;
                    padding-top: 0.7vh;
                    padding-bottom: 0.7vh;
                    padding-right: 1vw;
                    padding-left: 1vw;
                    font-size: 3vmin;
                    color: yellow;
                    border-radius: 50%;
                    right: 2vw;
                    text-align: right;
                    background-color:rgb(234, 153, 153);
                    margin-right: 2vw;
                    margin-top:5vh;
                }
                .imageTextBox{
                    width:90%; 
                    height: 40vh; 
                    background-color:beige;
                    outline: 0.2em solid black;
                    margin-left:5vw;
                    margin-top: 5vh;
                }
                #mapExample{
                    min-height: 30vh; 
                    min-width: 15vw;  
                    height: 30vh; 
                    width:15vw;
                    margin-top:10vh;
                }
                #mapTextExample{
                    font-size:6vmin;
                    width:60vw; 
                    margin-left:30vw; 
                    margin-top: 13vh;
                }
                #timerExample{
                    margin-top:10vh;
                    margin-left:70vw; 
                    min-height: 30vh; 
                    min-width: 15vw;  
                    height: 30vh; 
                    width:15vw;
                }
                #timerTextExample{
                    font-size:6vmin;
                    width:50vw; 
                    margin-left:12vw; 
                    margin-top: 13vh;
                }
                #fiveStarImage{
                    margin-left:10vw; 
                    min-height: 30vh; 
                    min-width: 15vw;
                    height: 30vh; 
                    width:30vw; 
                    margin-top:35vh;
                }
                #ratingText{
                    font-size:4vmin;
                    height:15vh; width:35vw; 
                    margin-left:10vw; 
                    margin-top: 15vh;
                }
                #appStoreImage{
                    margin-left:30vw; 
                    min-height: 10vh; 
                    min-width: 12vw;  
                    height: 12vh; 
                    width:10vw; 
                    margin-top:30vh
                }
                #googleStoreImage{
                    margin-left:10vw; 
                    min-height: 10vh; 
                    min-width: 10vw;  
                    height: 10vh; 
                    width:10vw; 
                    margin-top:30vh; 
                }
                #ratingsBox{
                    width:40vw   
                }
                #commentsBox{
                    height: 40vh;
                }
                #commentsText1{
                    margin-top: 5vh;
                    width: 38vw;
                }
                #commentsText2{
                    margin-top: 17vh;
                    width: 30vw;
                }
                #commentsText3{
                    margin-top: 30vh;
                }
            }
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                .topButtons{
                    position: absolute;
                    padding-top: 0.7vh;
                    padding-bottom: 0.7vh;
                    padding-right: 1vw;
                    padding-left: 1vw;
                    font-size: 3vmin;
                    color: yellow;
                    border-radius: 50%;
                    right: 2vw;
                    text-align: right;
                    background-color:rgb(234, 153, 153);
                    margin-right: 2vw;
                    margin-top:2.5vh;
                }
                .imageTextBox{
                    width:90%; 
                    height: 20vh; 
                    background-color:beige;
                    outline: 0.2em solid black;
                    margin-left:5vw;
                    margin-top: 2vh;
                }
                #mapExample{
                    height: 15vh; 
                    width:30vw;
                    margin-top:5vh;
                }
                #mapTextExample{
                    font-size:5vmin;
                    width:40vw; 
                    margin-left:50vw; 
                    margin-top: 3vh;
                }
                #timerExample{
                    margin-top:4.5vh;
                    margin-left:55vw; 
                    height: 15vh; 
                    width:30vw;
                }
                #timerTextExample{
                    font-size:5vmin;
                    width:40vw; 
                    margin-left:12vw; 
                    margin-top: 3vh;
                }
                #fiveStarImage{
                    margin-left:10vw; 
                    height: 15vh; 
                    width:30vw; 
                    margin-top:16vh;
                }
                #ratingText{
                    font-size:3.5vmin;
                    height:15vh; 
                    width:30vw; 
                    margin-left:10vw; 
                    margin-top: 7vh;
                }
                #appStoreImage{
                    margin-left:25vw;   
                    height: 5vh; 
                    width:20vw; 
                    margin-top:16vh
                }
                #googleStoreImage{
                    margin-left:6vw; 
                    height: 4vh; 
                    width:16vw; 
                    margin-top:16vh; 
                }
                #ratingsBox{
                    width:40vw;
                    height: 20vh;
                }
                #commentsBox{
                    height: 20vh;
                }
                #commentsText1{
                    margin-top: 3vh;
                    width:38vw;
                }
                #commentsText2{
                    margin-top: 12vh;
                    width:30.8vw;
                }
                #commentsText3{
                   display: none;
                }
                #bottomSpace{
                    display: none;
                }
                #footer{
                    display:none;
                }
            }
            body{
                background-color:aliceblue
            }

        </style>
    </head>
    <body>
        <!--The top margin with the login and signup buttons-->
        <div><a href = index.php><img id = logo src = "Icons/Logo.png"></a></div>
		<a href="new_account_page.php"><button id = "indexPageSignUpButton" class ="topButtons" style = "margin-right:12vw;">Sign Up</button></a>
        <a href="login_page.php"><button id = "indexPageSignInButton" class ="topButtons" style = "margin-right:0.2vw;">Sign In</button></a>
        <div id = topMargin>Find a Loop</div>

		<br>
        <h1 style = "text-align: center;">Looking for the perfect running route?</h1>

        <!--The slideshow-->
        <div class="slideshow" id = photoOne style = "text-align: center;">
            <img src="index_slideshow_photos\photo1.jpg" style="width:100%">
        </div>
        
        <div class="slideshow" id = photoTwo style = "text-align: center;">
            <img src="index_slideshow_photos\photo2.jpg" style="width:100%">
        </div>
        
        <div class="slideshow" id = photoThree style = "text-align: center;">
            <img src="index_slideshow_photos\photo3.jpg" style="width:100%">
        </div>

        <div class="slideshow" id = photoFour style = "text-align: center;">
            <img src="index_slideshow_photos\photo4.jpg" style="width:100%">
        </div>
        <!--Loop example-->
        <img  id = mapExample src="Icons/indexPageMapExample.png" style="margin-left:12vw; position:absolute"></p>
        <span id = mapTextExample style = "position:absolute; float: right;">Search our vast library of user created "loops" to find that perfect running or walking route</span>
        <div class = imageTextBox></div>
        <br>

        <!--stopwatch example-->
        <img src="Icons/stopwatchImage.PNG" id =timerExample style="position:absolute; outline: 0.2em solid black"></p>
        <span id = timerTextExample style = "position:absolute; float: right;">Use our state-of-the-art stopwatch for accurate distance and pace measurements</span>
        <img id = fiveStarImage src="Icons/5star.jpg" style="z-index: 2; position:absolute;"></p>
        <div class = imageTextBox></div>
        <br>

        <!--Fake App and Google store review-->
        <div  id = commentsBox class = imageTextBox style = "margin-left: 54vw; position: absolute; width:40vw"></div>
        <div id = ratingsBox class = imageTextBox style = "position: absolute;"></div>
        <img id = appStoreImage src="Icons/appStoreIcon.png" style="position:absolute;"></p>
        <img id = googleStoreImage src="Icons/googlePlayIcon.jpg" style="position:absolute;"></p>
        <span id = ratingText style = "position:absolute; float: right;">A perfect, 5 star rating in the App and Google Play store!</span>

        <!--Fake comments on the app-->
        <span id = commentsText1 style = "position:absolute; font-size:4vmin; float: right; height:15vh; margin-left:56vw;">"Great website, found some great hiking trails!" -Nick</span>
        <span id = commentsText2 style = "position:absolute; font-size:4vmin; float: right; height:15vh; margin-left:56vw;">"App is easy to use and works great!" -Josh</span>
        <span id = commentsText3 style = "position:absolute; font-size:4vmin; float: right; height:15vh; width:35vw; margin-left:56vw;">"Found some new walking paths from the website" -Matt</span>

        <!--Creates a space on the bottom that makes the footer fit nicely-->
        <div id = bottomSpace style = "margin-top: 50vh;"></div>
        <br><br>
        <?php include("footer.html"); ?>
    </body>
</html>