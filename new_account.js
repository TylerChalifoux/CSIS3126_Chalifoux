$(document).ready(function(){
    $('#signUpButton').click(function(){
        var topPassword = $('#topPasswordBox').val();
        var bottomPassword = $('#bottomPasswordBox').val();
        var newUsername = $('#newUsername').val();
        $('.passwordBox').css("border-color", "black");
        $('#errorMessageTop').css("color", "black");
        $('#errorMessageBottom').css("color", "black");
        var goodPassword = true;
        
        if(topPassword.length<7 || bottomPassword.length<7){
            $('.passwordBox').css("border-color", "red");
            $('#errorMessageTop').css("color", "red");
            goodPassword = false;
        }
        if(topPassword != bottomPassword){
            $('.passwordBox').css("border-color", "red");
            $('#errorMessageBottom').css("color", "red");
            goodPassword = false;
        }
        
        //ONCE THE PASSWORD HAS BEEN VERIFIED TO BE GOOD
        if(goodPassword){
          console.log(newUsername);
          console.log(bottomPassword);
        }
    });
});
