$(document).ready(function(){
    //All information about the loop
    let town = "";
    let state = "";
    let distance = "";
    let mapid = "";
    var coords = new URLSearchParams(window.location.search).get('coords');
    var wasSearched = new URLSearchParams(window.location.search).get('wasSearched');

    //This function is run when the user changes the status is they saved the loop or not. It then sends that information to a different processing file
    const checkbox = document.getElementById('isLiked');
    checkbox.addEventListener('change', (event) => {
        if(event.currentTarget.checked) {
            var sendToProcessing = new XMLHttpRequest();
            console.log("https://tchalifoux.jwuclasses.com/map_info_changeSavedLoops.php?status=saved&id="+mapid);
            sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/map_info_changeSavedLoops.php?status=saved&id="+mapid, true);
            sendToProcessing.send();
        }else{
            var sendToProcessing = new XMLHttpRequest();
            sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/map_info_changeSavedLoops.php?status=unsaved&id="+mapid, true);
            sendToProcessing.send();
        }
    })

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

    //This sends a request to the processing page and returns JSON file with all the details on the route and if the user has it saved
    var sendToProcessing = new XMLHttpRequest();
    sendToProcessing.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var JSONdata = (JSON.parse(sendToProcessing.responseText));
            distance = JSONdata[0];
            state = JSONdata[1];
            town = JSONdata[2];
            mapid = JSONdata[3];

            //Auto checks the box if the user has the loop saved
            if(JSONdata[4]=="saved"){
                document.getElementById("isLiked").checked = true;
            }else{
                document.getElementById("isLiked").checked = false;
            }

            //All of this below is to make a unique sentence when the loop appears
            var firstAdj =[" great "," perfect "," wonderful "," awesome "," fantastic "," terrific "," enjoyable "];
            var secondAdjShort = [" nice short loop. "," quick loop. "," brief loop. "," beautiful, quick loop. "];
            var secondAdjMed=[" scenic longer loop. "," medium sized loop. "," moderately sized loop. "];
            var secondAdjLong=[" long loop. "," considerable loop. "," large loop. ", " extravagant loop. "];
            var thirdAdjShort = [" Perfect for those quick walks. ", " Great for getting a fast workout in. "," A good size for a break from work."," A good distance to bring the dog for a walk."];
            var thirdAdjMed=[" Perfect for a workout."," Perfect distance for a run."," Great to get away for an hour or so."," Perfect for a long hike with the dog."];
            var thirdAdjLong=[" Perfect for a long workout."," Fantastic for an all day hike."," Great for those training for a marathon."," Perfect to get outside for awhile."];

            function getRandomInt(max) {
                return Math.floor(Math.random() * max);
            }
            adj1 = "";
            adj2 = "";
            adj3 = "";

            if(distance<4){
                adj1 = (firstAdj[getRandomInt(7)]);
                adj2 = (secondAdjShort[getRandomInt(4)]);
                adj3 = (thirdAdjShort[getRandomInt(4)]);

            }else if(distance<7 && distance>=4){
                adj1 = (firstAdj[getRandomInt(7)]);
                adj2 = (secondAdjMed[getRandomInt(3)]);
                adj3 = (thirdAdjMed[getRandomInt(4)]);

            }else if(distance>=7){
                adj1 = (firstAdj[getRandomInt(7)]);
                adj2 = (secondAdjLong[getRandomInt(4)]);
                adj3 = (thirdAdjLong[getRandomInt(4)]);
            }

             //below is for the custom text seen next to the image
            document.getElementById("mapTitle").innerText = distance + " mile loop in " + town+", " + state;
            document.getElementById("mapInfo").innerText = "This"+adj1+distance+ " mile loop in " + town + " is a"+adj2+adj3;
        }
    };
    sendToProcessing.open("GET", "https://tchalifoux.jwuclasses.com/map_info_processing.php?coords=" + coords, true);
    sendToProcessing.send();

    //If the user was on the home menu, the button brings them back. If the user had searched, it will research the same thing
    $('#backHomeButton').click(function(){
        if(wasSearched === "True"){
            location.href = "https://tchalifoux.jwuclasses.com/search_page.php?search="+town;
        }else if(wasSearched === "profile"){
            location.href = "https://tchalifoux.jwuclasses.com/profile_page.php";
        }else{
            location.href = "https://tchalifoux.jwuclasses.com/home_page.php";
        }
    });
});