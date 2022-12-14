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

    //Function to send the user back home
    $('#backHomeButton').click(function(){
        location.href = "https://tchalifoux.jwuclasses.com/home_page.php";
    });

    //Requests a JSON file from processing to get all the loops from the entered town
    var sendToProcessing = new XMLHttpRequest();
        sendToProcessing.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var JSONdata = (JSON.parse(sendToProcessing.responseText));
                //If it found something, show the maps
                    if(JSONdata[JSONdata.length-1]>0){
                        //Loops through the JSON file and prints a map in that location
                        for (let i = 0; i < JSONdata[JSONdata.length-1]; i++) {
                            document.getElementById("localMap"+i).style.display = "inline-block";
                            document.getElementById("mapText"+i).style.visibility = "visible";
                            $("#mapText"+i).text('A ' + JSONdata[i][1]+ ' mile loop in ' + JSONdata[i][2]+', '+JSONdata[i][3]);
                            showMap("localMap"+i, JSONdata[i][0]);
                            //Sets the URL to was searched to make the more info back button bring you back here
                            document.getElementById("mapURL"+i).href = "map_info.php?coords="+JSONdata[i][0] + "&wasSearched=True";
                        }
                    }else{
                        //If it found nothing, show the no results graphics
                        document.getElementById("noResults").style.display = "inline-block";
                    }
                }
            };
    
            sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/search_processing.php?search=" + document.getElementById("searchText").innerText, true);
            sendToProcessing.send();
});