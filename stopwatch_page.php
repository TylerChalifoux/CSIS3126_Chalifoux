<?php
include("verifyLoggedIn.php");
include("global.php");
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Stopwatch</title>

        <!-- Top source is for Google Map's API, other two are conventional HTML stuff -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="mobile.js"></script>
        <link rel="stylesheet" href="mainStyling.css">


        <!-- Styling for mobile and desktop-->
        <style>
            .loopDetailsList{
                margin-top: 0.2em;
                margin-bottom: 0.2em;
                font-size: 0.8em;
            }

            @media only screen and (min-device-width : 360px) and (max-device-width : 640px)  
            {
                body{
                    font-size: 7em;
                    background: lightblue !important;
                }
                #timerBox{
                    background-color: darkblue;
                    color: white;
                    text-align: center;
                    margin-left: 0.7em;
                    margin-right: 0.7em;
                    margin-top: 1em;
                }

                .timerNums{
                    padding: 0.2em;
                    background-color: rgb(234, 153, 153);  
                    border: 0.05em solid black;
                    color: black;
                }
            }
            @media only screen and (min-device-width : 640px){
                #boxOnlySeenOnComputers{
                    display: inline-block !important;
                    background-color: lightblue !important;
                    color: black;  
                }
                #homeButton{
                    display: none;
                }
                #timerBox{
                    display: none;
                }
                #startButton{
                    display: none;
                }
                #stopButton{
                    display: none;
                }
                #resetButton{
                    display: none;
                }
        }
        </style>
    </head>
    <body>
        <a id = homeButton href = home_page.php><button class = buttonStyling style="padding: 0.3em;">Home</button></a>
        <button id = runBuddy class = buttonStyling style = "color: rgb(234, 153, 153);float: right; font-size: 0.4em">H</button>
        <br>
        <!-- For the google map after the loop is completed-->
        <div style="width:100%;height: 1000px; margin-top: 0.6em;">
            <img id = googleMap style="width:100%; margin-top: 0.6em;">

            <!-- This part is used to display the message when you are on a laptop instead of a phone-->
            <div id = boxOnlySeenOnComputers style = " display: none; text-align: center; font-size: 5em">
                <br>Really? You want to run with a laptop? Bring out your mobile phone and go back to this page<br><br>
                <a href = home_page.php><button class = buttonStyling style="padding: 2em;">Home</button></a>
            </div>

            <!-- Numbers and boxs for the timer-->
            <div id = timerBox>
                <p style = "padding-top: 0.5em;">Timer</p>
                <div>
                    <span id=min class = timerNums>00</span> : 
                    <span id=sec class = timerNums>00</span> : 
                    <span id=mil class = timerNums>00</span>
                </div><br>
                <div>
                    <button id = startButton class = buttonStyling style = "padding: 0.7em; color: green" type="button">Start</button>
                    <button id = stopButton class = buttonStyling style = "padding: 0.7em; color: red" type="button">Stop</button>
                    <button id = resetButton class = buttonStyling style = "padding: 0.7em; color: blue;" type="button">Reset</button>
                </div>
                <button id = finishButton style = "margin-top: 1em; padding-right:0.3em; padding-left:0.3em; padding-top: 0.8em; padding-bottom: 0.8em; display: none;"class = buttonStyling type="button">Tap to Finish</button>
                <br><br>
            </div>
        </div>

        <!-- Details of the run. Only displays after the loop is made-->
        <div id = divDetailsList style = "display: none;" >
            <div style="font-size: 1em; margin-top: 0.5em; margin-bottom: 0.5em; text-decoration: underline;">Details: </div>
            <p class = loopDetailsList>Time: <span id= finalTimeText style="font-size: 0.6em;"></span></p>
            <p class = loopDetailsList>Distance: <span id = finalDistanceText style="font-size: 0.6em;"></span></p>
            <p style = "margin-bottom: 0.5em;"class = loopDetailsList>Pace: <span id = finalPacetext style="font-size: 0.6em;"></span></p>

        </div>
        <button id = logButton class = buttonStyling style = "padding: 0.7em; color: yellow; margin-left: 2em; display: none;" type="button">Log Loop</button>
        <button id = restartButton class = buttonStyling style = "padding: 0.7em; color: yellow; display: none;" type="button">Restart Loop</button>
    </body>
</html>