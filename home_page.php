<!DOCTYPE html>
<html>
	<head>
        <title>Home</title>
        <link rel="stylesheet" href="mainStyling.css">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="home.js"></script>

        <style>
            body{
                background: lightgray !important;
            }

            .map{
                height: 18em;
                width: 18em;
                margin-left: 4.2em;
                border: 0.2em solid black;
                float:left;
                display:none
            }
            #div1{
                position: relative;
                top: 12em;
            }
        </style>
    </head>

    <body>
        <div id = logo><a href = index.html><img src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>
        <div>
            <img src = "Icons/runnerHomePage.PNG" style="width: 100%; position: absolute; z-index: -1;">
            <br><br><br><br><br><br><br><br>
            <center><input style="width:60%; height: 2em; font-size: x-large; border-radius: 50px; text-align: center;" placeholder="Search for a loop in your town or city"></center>
        </div>
        <div id = div1>
            <span id = locationText style="margin-top:1em; font-size:xx-large; margin-left: 3em;"></span>
            <br><br>
            <img id = localMap0 class = map>
            <img id = localMap1 class = map>
            <img id = localMap2 class = map>
            <img id = localMap3 class = map>
            <img id = localMap4 class = map>
            <div id = stopwatchLinkHome><a href = stopwatch_page.html><img src = "Icons/runningIcon.png" style="height: 5em;"></a>Log Run</div>
        </div>
    </body>

</html>
