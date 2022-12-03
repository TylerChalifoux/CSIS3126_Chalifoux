$(document).ready(function(){
    //All information about the loop
    let town = "";
    let state = "";
    let distance = "";
    var coords = new URLSearchParams(window.location.search).get('coords');

    //This all displays the proper map using the coordinates in the website URL
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
    showMap("map",coords);

    //This sends a request to the processing page and returns JSON file with all the details on the route
    var sendToProcessing = new XMLHttpRequest();
    sendToProcessing.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var JSONdata = (JSON.parse(sendToProcessing.responseText));
            console.log(JSONdata);
            distance = JSONdata[0];
            state = JSONdata[1];
            town = JSONdata[2];

             //below is for the custom text seen next to the image
            document.getElementById("mapTitle").innerHTML = distance + " mile loop in " + town+", " + state;
            document.getElementById("mapInfo").innerHTML = "This great "+distance+ "mile Loop in " + town + " is a nice short loop. Perfect for those quick workouts";
        }
    };
    sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/map_info_processing.php?coords=" + coords, true);
    sendToProcessing.send();
});