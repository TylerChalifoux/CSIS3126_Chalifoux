$(document).ready(function(){

    //----------------This is all for the creation of the map--------------------------------

    //here we center the map around those coordinates provided with the correct zoom
    var mapProp= {
        center:new google.maps.LatLng(41.824459,-71.412750),
        zoom:10,
      };
      //creates the new map and puts it into the div with that ID
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
      
      //This portion are the coordinates for the red line
      const flightPlanCoordinates = [
          { lat: 41.824459, lng: -71.412750 },
          { lat: 21.291, lng: -157.821 },
          { lat: -18.142, lng: 178.431 },
          { lat: -27.467, lng: 153.027 },
         ];

    //Creates the red line on our orginal map using the coordinates above
      var flightPath = new google.maps.Polyline({
        path:flightPlanCoordinates,
        strokeColor:"#0000FF",
        strokeOpacity:0.8,
        strokeWeight:2
      });

      //creates map
      flightPath.setMap(map);


//----------------This is all for the creation of the timer and getting location---------------

    //This function is for the display of the timer
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
            if(currentSec>60){
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
                    $('Min').text('0' + currentMin);
                }else{
                    $('#Min').text(currentMin);
                }
            }
        }
    }


    //Sets the starting time to now and all values to 0
    startTime = Date.now();
    currentSec = 0;
    currentMil = 0;
    currentMin = 0;
    //Hides the log button unless the timer is stopped
    $('#logButton').css("display", "none");

    //Start button has been pressed, killed is now false, allowing the above function to run
    document.getElementById('startButton').addEventListener('click', ()=>{
        killed = false;
        $('#logButton').css("display", "none");
        $('#timerBox').css("background-color","green");

        //This function runs at a specified rate. We have set for once every millisecond
        setInterval(function() {
            //Runs the above function
            timerInfo();
        }, 1);
            //While running the above every millisecond, it also runs the below function every 5 seconds
            setInterval(function() {
            if(!killed){
                //as long as timer is running, log location
                function success(pos) {
                    console.log(`Latitude : ${pos.coords.latitude}`);
                    console.log(`Longitude: ${pos.coords.longitude}`);
                }
                navigator.geolocation.getCurrentPosition(success);
            }
            }, 5000);
    });

    //Sets killed to true, stopping timer, updating background, and as long as the timer ran for 10 seconds, the run log button is shown
    document.getElementById('stopButton').addEventListener('click', ()=>{
        $('#timerBox').css("background-color","red");
        if(currentSec > 10){
            $('#logButton').css("display", "inline-block");
        }
        killed = true;
        });

    //As long as timer is stopped, resets all values, runs one loop of the display to display all 0s, and sets killed equal to true again
    document.getElementById('resetButton').addEventListener('click', ()=>{
        if(killed){
            $('#logButton').css("display", "none");
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

    //Does the same thing as reset, but also logs a run giving the use an upadate
    document.getElementById('logButton').addEventListener('click', ()=>{
        $('#timerBox').css("background-color","purple");
        $('#timerBox').css("background-color","darkblue");
        currentSec = 0;
        currentMil = 0;
        currentMin = 0;
        startTime = Date.now();
        killed = false;
        timerInfo();
        killed = true;
        alert("Run logged");
    });
});