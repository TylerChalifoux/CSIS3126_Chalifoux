<?php
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


        <!-- Styling for mobile and desktop-->
        <style>
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
                
                .buttonStyling{
                    margin-left: 0.6em;
                    margin-right: 0.6em;
                    font-size: 0.6em;
                    height:1.7em;
                }

                .timerNums{
                    padding: 0.2em;
                    background-color: lightgray;
                    color: black;
                }
            }
            @media only screen and (min-device-width : 640px){
                #timerBox{
                    background:rgb(0, 162, 255) !important;
                    color: white;
                    text-align: center;
                    margin-left: 37em;
                    margin-right: 37em;
                    margin-top: 15em;
                }
                #startButton{
                    float: left;
                    margin-left: 2em;
                }
                #stopButton{

                }
                #resetButton{
                    float: right;
                    margin-right: 2em;
                }
        }
        </style>
    </head>
    <body>
        <div id = logo><a href = home_page.html><img src = "Icons/Logo.png"></a></div>
        <div id = timerBox>
            <br><p>Timer</p><br>
            <div>
                <span id=min class = timerNums>00</span> : 
                <span id=sec class = timerNums>00</span> : 
                <span id=mil class = timerNums>00</span>
            </div><br>
            <button id = startButton class = buttonStyling style = "float: left;" type="button">Start</button>
            <button id = stopButton class = buttonStyling type="button">Stop</button>
            <button id = resetButton class = buttonStyling style = "float: right;" type="button">Reset</button>
            <br><br>
            <button id = logButton class = buttonStyling type="button">Click to Log</button>
            <br><br>
        </div>

        <!-- Below this is everything for displaying the map in HTML -->
        <div id="googleMap" style="width:100%;height:400px;"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD9NnV8F9xGod5y443nhdSWb-gIFNqphw&callback=initMap&v=weekly"
        defer
        ></script>
    </body>
</html>