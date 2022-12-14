$(document).ready(function(){
    const form = document.getElementById('newAccountForm')

    //Stops the form from submitting when you click submit. The form must be submitted manually now. This is only done at end when the password is good.
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        });
    
    //assigns all the variables equal to the user input, defaults the error messages to black, and assigns the good password variable to true
    $('#signUpButton').click(function(){
        var topPassword = $('#topPassInput').val();
        var bottomPassword = $('#bottomPassInput').val();
        var username = $('#newUsername').val();
        $('#usernameErrorMessage').css("color", "black");
        $('#passCharErrorMessage').css("color", "black");
        $('#passMatchErrorMessage').css("color", "black");
        var goodPasswordandUsername = true;

       //checks if username is less than 5 characters, turns the error message text red if false
        if(username.length<5){
            $('#usernameErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        
        //checks if the top and bottom password are less than 7 characters, turns the error message text red if false
        if(topPassword.length<5 || bottomPassword.length<5){
            $('#passCharErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        //checks if the top and bottom password don't match, turns the error message text red if false
        if(topPassword != bottomPassword){
            $('#passMatchErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        
        //ONCE THE PASSWORD HAS BEEN VERIFIED TO BE GOOD, submit the form
        if(goodPasswordandUsername){
            $('#newAccountForm').submit();
        }
    });
});
