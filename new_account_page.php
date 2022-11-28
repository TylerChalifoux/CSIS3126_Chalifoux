<!DOCTYPE html>
<html>
	<head>
		<title> Create An Account </title>
		<link rel="stylesheet" href="mainStyling.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="new_account.js"></script>

        <style>
            @media only screen and (min-device-width : 360px) and (max-device-width : 640px){
                #signUpButton{
					font-size: 4vmin;
				}
                #newAccountPageHookText{
                    text-align: center;
                    margin-top: 5vh;
                    font-size: 4vmin;
                    margin-bottom: 2vh;
                }
                .userPassErrorMess{
                    margin-top: 1vh;
                    font-size: 3vmin;
                }
                .newAccountAndLoginPageBox{
                    margin-top: 4vh;
                }
            }
            @media only screen and (min-device-width : 640px){
                #signUpButton{
					font-size: 2.5vmin;
				}
                #newAccountPageHookText{
                    text-align: center;
                    margin-top: 10vh;
                    font-size: 5vmin;
                }
                .userPassErrorMess{
                    margin-top: 1vh;
                    font-size: 1.5vmin;
                }
            }
            body{
				background: url(Icons/landingNewAccountBackground.jpg);
				background-size: auto;
			}
        </style>
    
	</head>           

    <body>
        <div><a href = index.html><img id = logo src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>

        <h1 id = newAccountPageHookText>Your search for a new running route ends here</h1>

        <div class = newAccountAndLoginPageBox>
            <br>
            <form id = newAccountForm action="new_account_processing.php" method="POST">
                <p style = "margin-bottom: 0.5vh;">Enter a New Username Below</p>
                <input type="text" placeholder="Enter New Username" class = "inputBox" name = "newUsername" id = "newUsername" value="<?php echo htmlspecialchars($_POST["newUsername"], ENT_QUOTES);?>"><br />
                <p id = "usernameErrorMessage" class = userPassErrorMess>- Username must be at least 5 characters</p>
                <p class = userPassErrorMess style = "color: red;"> <?php echo $errorMessage; ?> </p>

                <p style = "margin-top: 3vh; margin-bottom: 0.5vh">Enter a New Password Below</p>
                <input type="password" placeholder="Enter New Password" class = "inputBox" name = "topPassInput" id = "topPassInput" value="<?php echo htmlspecialchars($_POST["topPassInput"], ENT_QUOTES);?>"><br />
                <p style = "margin-top: 2vh; margin-bottom: 0.5vh;">Confirm Password Below</p>
                <input type="password" placeholder="Re-enter New Password" class = "inputBox" name = "bottomPassInput" id = "bottomPassInput" value="<?php echo htmlspecialchars($_POST["bottomPassInput"], ENT_QUOTES);?>"><br />
                <p id = "passCharErrorMessage" class = userPassErrorMess>- Password must be at least 8 characters</p>
                <p id = "passMatchErrorMessage" class = userPassErrorMess>- Both passwords must match </p>
                <br>
                <button class = buttonStyling id ="signUpButton" type="submit">Sign Up</button>
                <br><br>
            </form>
        </div>
    </body>
</html>