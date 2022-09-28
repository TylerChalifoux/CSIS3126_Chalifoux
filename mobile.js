$(document).ready(function(){
    timerInfo = function(){
        if(!killed){
            currentMil = Date.now() - startTime;
            if(currentMil>1000){
                startTime = Date.now();
                currentMil = 0;
                currentSec++;
            }else{
                if(currentMil<10){
                    $('#mil').text('00');
                }else if(currentMil<100){
                    $('#mil').text('0' + Math.floor(currentMil/10));
                }else{
                    $('#mil').text(Math.floor(currentMil/10));
                }
            }
            if(currentSec>60){
                startTime = Date.now();
                currentMil = 0;
                currentSec = 0;
                currentMin++;
            }else{
                if(currentSec<10){
                    $('#sec').text('0' + currentSec);
                }else{
                    $('#sec').text(currentSec);
                }
            }

            if(currentMin>99){
                startTime = Date.now();
                currentMil = 0;
                currentSec = 0;
                currentMin = 0;
            }else{
                if(currentMin<10){
                    $('Min').text('0' + currentMin);
                }else{
                    $('#Min').text(currentMin);
                }
            }
        }
    }

        startTime = Date.now();
        currentSec = 0;
        currentMil = 0;
        currentMin = 0;
        $('#logButton').css("display", "none");
    document.getElementById('startButton').addEventListener('click', ()=>{
        killed = false;
        $('#logButton').css("display", "none");
        $('#timerBox').css("background-color","green");
        setInterval(function() {
            timerInfo();
        }, 1);
        setInterval(function() {
        function success(pos) {
            const crd = pos.coords;
            console.log('Your current position is:');
            console.log(`Latitude : ${crd.latitude}`);
            console.log(`Longitude: ${crd.longitude}`);
            console.log(`More or less ${crd.accuracy} meters.`);
        }
            navigator.geolocation.getCurrentPosition(success);
         }, 1000);
    });

    document.getElementById('stopButton').addEventListener('click', ()=>{
        $('#timerBox').css("background-color","red");
        if(currentMil != 0 && currentSec != 0){
            $('#logButton').css("display", "inline-block");
        }
        killed = true;
        });

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