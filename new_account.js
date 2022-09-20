$(document).ready(function(){
    $('#signUpButton').click(function(){
        var topPassword = $('#topPasswordBox').val();
        var bottomPassword = $('#bottomPasswordBox').val();
        
        if(topPassword != bottomPassword){
            $('#passwordBox').css('border')
            $('#errorMessage').text("ERROR: Passwords do not match");
        }else{
            console.log("They dont match");
        }
    
    
    
    });


    
});
