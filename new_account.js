/* This page is a local authentication of the entered password. The way it works is by first stopping the form
from subbmitting allowing the form to now only submit when told to. The password is then verified to be matching
and enough characters. The username is also checked to make sure it's long enough. If not, the form is not submitted 
but the text color changes for the error messages. If all is good, the form is then submitted and sent to the 
new_account_processing for username authentication and another round of password authentication. If good, the user account is created
*/

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

       //checks if username is less than 5 charcters, turns the error message text red if false
        if(username.length<5){
            $('#usernameErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        
        //checks if the top and bottom password are less than 7 charcters, turns the error message text red if false
        if(topPassword.length<5 || bottomPassword.length<5){
            $('#passCharErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        //checks if the top and bottom password dont match, turns the error message text red if false
        if(topPassword != bottomPassword){
            $('#passMatchErrorMessage').css("color", "red");
            goodPasswordandUsername = false;
        }
        
        //ONCE THE PASSWORD HAS BEEN VERIFIED TO BE GOOD
        if(goodPasswordandUsername){
            $('#newAccountForm').submit();
        }
    });
});
