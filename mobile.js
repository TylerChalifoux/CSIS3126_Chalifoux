$(document).ready(function(){
    
    //This function converts an array of long and lat to one string in the format google wants it
    function coordsToString(arr){
        var i = 0;
        var run = "";
        while(i<arr.length){
            run = run + arr[i];
            if(i%2==1 && i != arr.length-1){
                run = run + '|';
            }else if(i%2!=1){
                run = run + ',';
            }
                i++;
        }
        return run;
    }

    //This function takes in an HTML ID and one string of all the coordinates and prints the map to the element with that ID
    function showMap (id, coords){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                //If good, place map in that id
                document.getElementById(id).src= xhttp.responseURL;
            }
        };
        var mapURL = "https://maps.googleapis.com/maps/api/staticmap?";
        var mapColor = "path=color:0xff0000ff|weight:2|";
        var mapKey = "key=AIzaSyCD9NnV8F9xGod5y443nhdSWb-gIFNqphw";
        var mapSize = "&size=400x400&";

        xhttp.open("GET", mapURL + mapColor + coords + mapSize + mapKey, true);
        xhttp.send();
    }
    
    //This hideous function is from Google Maps API. This allows you to find the distance between two long and lat points on the globe
    function getDistanceFromLatLonInMi(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1); 
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2); 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        return (d/1.609); // returns miles
      }
      function deg2rad(deg) {
        return deg * (Math.PI/180)
      }
    
     //This portion are the coordinates for the red line on the map and to center the map correctly
     const runPath = [];
     numOfCoords = 0;
     totalDistance = 0;

    //This function is for the display of the timer
    killed = false;
    timerInfo = function(){
        //Killed is true if the timer is stopped
        if(!killed){
            //Sets the timer equal the difference in between the start and now
            currentMil = Date.now() - startTime;
            //if the miliseconds goes above 1000, increase seconds by 1 and reset the start timer to now
            if(currentMil>1000){
                startTime = Date.now();
                currentMil = 0;
                currentSec++;
            }else{
                //Adds one or two zeros into the display of the miliseconds to prevent text from moving
                if(currentMil<10){
                    $('#mil').text('00');
                }else if(currentMil<100){
                    $('#mil').text('0' + Math.floor(currentMil/10));
                }else{
                    $('#mil').text(Math.floor(currentMil/10));
                }
            }

            //If the seconds goes over 60, the minutes are increased and everything else is reset
            if(currentSec>59){
                startTime = Date.now();
                currentMil = 0;
                currentSec = 0;
                currentMin++;
            }else{
                //adds a 0 if seconds are below 10. This prevents the text from moving when going from 9 to 10
                if(currentSec<10){
                    $('#sec').text('0' + currentSec);
                }else{
                    $('#sec').text(currentSec);
                }
            }

            //resets everything to 0 once the timer hits 99
            if(currentMin>99){
                startTime = Date.now();
                currentMil = 0;
                currentSec = 0;
                currentMin = 0;
            }else{
                //adds a 0 if minutes are below 10. This prevents the text from moving when going from 9 to 10
                if(currentMin<10){
                    $('#min').text('0' + currentMin);
                }else{
                    $('#min').text(currentMin);
                }
            }
        }
    }

    //Sets the starting time to now and all values to 0
    startTime = Date.now();
    currentSec = 0;
    currentMil = 0;
    currentMin = 0;

    //Start button has been pressed, killed is now false, allowing the above function to run
    document.getElementById('startButton').addEventListener('click', ()=>{
        killed = false;
        $('#timerBox').css("background-color","green");
        $('#finishButton').css("display","none");

        //This function runs at a specified rate. We have set for once every millisecond
        setInterval(function() {
            //Runs the above function
            timerInfo();
        }, 1);
            //While running the above every millisecond, it also runs the below function every 5 seconds
            setInterval(function() {
            if(!killed){
                //as long as timer is running, log location
                function success(position) {
                    //As long as the location is accurate up to 75 meters
                    if(position.coords.accuracy < 75){
                        //Increments the amount of coordinates and adds up the total for long and lat. This is used below to center the map in the middle of path
                        numOfCoords++;

                        //This it to get the total distance
                        if(numOfCoords>1){
                            totalDistance = totalDistance + getDistanceFromLatLonInMi(oldLat, oldLong, position.coords.latitude, position.coords.longitude);
                            oldLat = position.coords.latitude;
                            oldLong = position.coords.longitude;
                        }else{
                            oldLat = position.coords.latitude;
                            oldLong = position.coords.longitude;
                        }

                        //Push the long and lat into the array used to make the path
                        runPath.push(position.coords.latitude);
                        runPath.push(position.coords.longitude);
                    }
                }

                //if location does not work
                function failure() {
                    alert("You must enable location services to use the app");
                }

                //Allows the program to use a better location
                const options = {
                    enableHighAccuracy: true,
                }
                window.navigator.geolocation.getCurrentPosition(success, failure, options);
            }
            }, 5000);
    });

    //Sets killed to true, stopping timer, updating background, and as long as the timer ran for 10 seconds, the run log button is shown
    document.getElementById('stopButton').addEventListener('click', ()=>{
        $('#timerBox').css("background-color","red");
        if(currentMin > 0 || currentSec > 10){
            $('#finishButton').css("display", "inline-block");
        }
        killed = true;
        });

    //As long as timer is stopped, resets all values, runs one loop of the display to display all 0s, and sets killed equal to true again
    document.getElementById('resetButton').addEventListener('click', ()=>{
        if(killed){
            $('#timerBox').css("background-color","darkblue");
            currentSec = 0;
            currentMil = 0;
            currentMin = 0;
            startTime = Date.now();
            killed = false;
            timerInfo();
            killed = true;
        }
    });

    //This button sets all values back to 0, gets the total time, shows the map and details, and unlocks two more buttons for the user
    document.getElementById('finishButton').addEventListener('click', ()=>{
        $('#timerBox').css("background-color","purple");
        $('#timerBox').css("background-color","darkblue");

        //Gets the total time in seconds. This is used farther down to display the total time in plain english
        totalTime = ((currentMin*60) + (currentSec) +(currentMil/1000)); 
        currentSec = 0;
        currentMil = 0;
        currentMin = 0;
        startTime = Date.now();
        killed = false;
        timerInfo();
        killed = true;


        //creates the new map and puts it into the div with that ID
        showMap("googleMap", coordsToString(runPath));

           //Displays the two buttons now that the loop is done and details on the run
           $('#logButton').css("display", "inline-block");
           $('#restartButton').css("display", "inline-block");
           $('#divDetailsList').css("display", "inline-block");

           //Finds the pace from the total time and distance
           if(totalDistance>0){
                finalPace = ((totalTime/60)/totalDistance);
           }else{
                finalPace = 0;
           }

           if(finalPace>99){
            finalPaceText = "99+";
           }else{
            finalPaceText = finalPace.toFixed(3);
           }

           //Used for the plain english final time
           finalTimePlainEnglish = "";
           if(totalTime>59){
            totalMin = totalTime/60;
            if(totalMin>=2){
                finalTimePlainEnglish = Math.trunc(totalMin) + " minutes and ";
                totalTime = totalTime%60;
            }else{
                finalTimePlainEnglish = Math.trunc(totalMin) + " minute and ";
                totalTime = totalTime%60;
            }
           }
           if(totalTime>=2){
            finalTimePlainEnglish = finalTimePlainEnglish + Math.trunc(totalTime) + " seconds";
           }else{
            finalTimePlainEnglish = finalTimePlainEnglish + Math.trunc(totalTime) + " second";
           }

           //Sets the details list once the loop is finished
           $('#finalTimeText').text(finalTimePlainEnglish);
           $('#finalDistanceText').text(totalDistance.toFixed(3) + " miles");
           $('#finalPacetext').text(finalPaceText + " minutes/mile");
    });

    //Logs the users loop, brings that back to the home page
    document.getElementById('logButton').addEventListener('click', ()=>{
        alert("Run logged");
        location.href = 'https://tchalifoux.jwuclasses.com/home_page.php';

    });

    //Deletes the loop and starts over. Asks the user to confirm before deleting
    document.getElementById('restartButton').addEventListener('click', ()=>{
        if (confirm("Are you sure? Going forward will delete the loop")) {
            location.href = 'https://tchalifoux.jwuclasses.com/stopwatch_page.php';
        }
    });
});