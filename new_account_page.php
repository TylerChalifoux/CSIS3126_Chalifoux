<!--This is the page for creating a new account. First, the users fill out a form for a username, a password, and verify password.
Once completed, the form is forced to not submit unless manually submitted. The JS file then does local authentication of the entered information.
The password is then verified to be matching and enough characters. The username is also checked to make sure it's long enough. If not, the 
form is not submitted but the text color changes for the error messages. If all is good, the form is then submitted and sent to the 
new_account_processing for username authentication and another round of password authentication. If good, the user account is created and
the user is brought back to the login page.!-->

<!DOCTYPE html>
<html>
	<head>
		<title> Create An Account </title>
		<link rel="stylesheet" href="mainStyling.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://tchalifoux.jwuclasses.com/new_account.js"></script>
    
	</head>           

    <body>
        <div id = logo><a href = index.html><img src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>
        <h1 id = newAccountPageHookText>Your search for a new running route ends here</h1>
        <div id = userInputAreaCenterBox>
            <br>
            <form id = newAccountForm action="new_account_processing.php" method="POST">
                
                <p style = "margin-top: 0.3em; margin-bottom: 0.2em;">Enter a New Username Below</p>
                <input type="text" placeholder="Enter New Username" class = "mobileStyleBox" name = "newUsername" id = "newUsername" style = "margin-top: 0.2em;" value="<?php echo htmlspecialchars($_POST["newUsername"], ENT_QUOTES);?>"><br />
                <p id = "usernameErrorMessage" style = "font-size: small;">- Username must be at least 5 characters</p>
                <p style = "color: red; font-size: small;"> <?php echo $errorMessage; ?> </p>

                <p style = "margin-bottom: 0.3em;">Enter a New Password Below</p>
                <input type="password" placeholder="Enter New Password" class = "mobileStyleBox" name = "topPassInput" id = "topPassInput" style = "margin-top: 0.2em;" value="<?php echo htmlspecialchars($_POST["topPassInput"], ENT_QUOTES);?>"><br />
                <p style = "margin-top: 0.2em; margin-bottom: 0.2em;">Confirm Password Below</p>
                <input type="password" placeholder="Re-enter New Password" class = "mobileStyleBox" name = "bottomPassInput" id = "bottomPassInput" style = "margin-top: 0.2em;" value="<?php echo htmlspecialchars($_POST["bottomPassInput"], ENT_QUOTES);?>"><br />
                <p id = "passCharErrorMessage" style = "font-size: small;">- Password must be at least 8 characters</p>
                <p id = "passMatchErrorMessage" style = "font-size: small;">- Both passwords must match </p>
                <br>
                <button class = mobileButton id ="signUpButton" type="submit">Sign Up</button>
                <br><br>
            </form>
        </div>
    </body>
</html>