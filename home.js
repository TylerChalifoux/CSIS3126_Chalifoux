$(document).ready(function(){

    //This is the function that takes an HTML ID and coordinates and makes a map in that ID
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

    //All of this shows the users active location and loops nearby
    town = "";
    state = "";
    function success(position) {
        //gets the users location
        var getTownAndState = new XMLHttpRequest();
        getTownAndState.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                var JSONdata = (JSON.parse(getTownAndState.responseText));
                //Sends a request to google to get the location 
                town = (JSONdata.results[0].address_components[0].long_name);
                state = (JSONdata.results[0].address_components[2].long_name);
                document.getElementById("locationText").innerHTML = "Loops near: " + town + ", " + state;
                document.getElementById("defaultSearch").value = town;
            
                //Send a request to processing using the state and town to get nearby loops
                var sendToProcessing = new XMLHttpRequest();
                sendToProcessing.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var JSONdata = (JSON.parse(sendToProcessing.responseText));
                        if(JSONdata[JSONdata.length-1]>0){
                            //Loops through the JSON file and prints a map in that location
                            for (let i = 0; i < JSONdata[JSONdata.length-1]; i++) {
                                document.getElementById("localMap"+i).style.visibility = "visible";
                                document.getElementById("mapText"+i).style.visibility = "visible";
                                $("#mapText"+i).text('A ' + JSONdata[i][1]+ ' mile loop near ' + town);
                                showMap("localMap"+i, JSONdata[i][0]);
                                document.getElementById("mapURL"+i).href = "map_info.php?coords="+JSONdata[i][0] + "&wasSearched=False";
                            }
                        }else{
                            document.getElementById("locationText").innerHTML = "No loops in your area, search for one.";
                        }
                    }
                };
    
                sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/home_processing.php?town=" + town + "&state=" + state, true);
                sendToProcessing.send();
            }
        }
            var geocodeURL = " https://maps.googleapis.com/maps/api/geocode/json?";
            var coords = "latlng="+position.coords.latitude+","+position.coords.longitude;
            var geoKeyAndType = "&key=AIzaSyCD9NnV8F9xGod5y443nhdSWb-gIFNqphw&result_type=locality";
            getTownAndState.open("GET", geocodeURL + coords + geoKeyAndType, false);
            getTownAndState.send();
    }
    function failure() {
        document.getElementById("locationText").innerHTML = "No loops in your area, search for one.";
    }

    //Allows the program to use a better location
    const options = {
        enableHighAccuracy: true,
    }
    window.navigator.geolocation.getCurrentPosition(success, failure, options);
});