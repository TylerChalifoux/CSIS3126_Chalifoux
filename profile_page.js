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

    $('#backHomeButton').click(function(){
        location.href = "https://tchalifoux.jwuclasses.com/home_page.php";
    });
    $('#signOutButton').click(function(){
        var sendToProcessing = new XMLHttpRequest();
        sendToProcessing.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.href = "https://tchalifoux.jwuclasses.com/index.php";
            }
        };
        sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/global.php?signout=true", true);
        sendToProcessing.send();
    });

    var sendToProcessing = new XMLHttpRequest();
        sendToProcessing.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                var JSONdata = (JSON.parse(sendToProcessing.responseText));
                    if(JSONdata[JSONdata.length-1]>0){
                        //Loops through the JSON file and prints a map in that location
                        for (let i = 0; i < JSONdata[JSONdata.length-1]; i++) {
                            document.getElementById("localMap"+i).style.display = "inline-block";
                            document.getElementById("mapText"+i).style.visibility = "visible";
                            $("#mapText"+i).text('A ' + JSONdata[i][1]+ ' mile loop in ' + JSONdata[i][2]+', '+JSONdata[i][3]);
                            showMap("localMap"+i, JSONdata[i][0]);
                            document.getElementById("mapURL"+i).href = "map_info.php?coords="+JSONdata[i][0] + "&wasSearched=profile";
                        }
                    }else{
                        document.getElementById("noResults").style.display = "inline-block";
                    }
                    //This displays the footer if not on mobile
                    if(window.innerWidth>600){
                        document.getElementById("footer").style.display = "inline-block";
                        document.getElementById("footer").style.width = "100%";
                    }
                }
            };
    
            sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/profile_page_processing.php", true);
            sendToProcessing.send();
});