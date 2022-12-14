<!DOCTYPE html>
<html>
	<head>
		<title> Sign in </title>
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" href="mainStyling.css">

		<!--Has styling for desktop and mobile -->
		<style>
			@media only screen and (min-device-width : 360px) and (max-device-width : 640px){
				#signInButton{
					margin-top: 1vh;
					font-size: 4vmin;
				}
				#loginText{
					color: rgb(229, 255, 0);
					text-shadow: 2px 2px 5px black;
					font-family: Bradley Hand, cursive;
					font-size: 8vmin;
					text-decoration: underline black 0.1em;
				}
				body{
					background: url(Icons/landingNewAccountBackground.jpg);
					background-size: stretch;
				}
				#footer{
                    display:none;
                }
			}
			@media only screen and (min-device-width : 640px){
				#signInButton{
					margin-top: 1vh;
					font-size: 2.5vmin;
				}
				#loginText{
					color: rgb(229, 255, 0);
					text-shadow: 2px 2px 5px black;
					font-family: Bradley Hand, cursive;
					font-size: 4.5vmin;
					text-decoration: underline black 0.1em;
				}
				body{
					background: url(Icons/landingNewAccountBackground.jpg);
					background-size: cover;
				}
				#footer{
                    margin-top:30vh;
                }
			}

		</style>
	</head>

	<body>
		<!--Top margin with logo-->
		<div><a href = index.php><img id = logo src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>

		<div class = newAccountAndLoginPageBox>
			<!--Form that submits the user info to the processing page-->
			<form id = "userInputAreaCenterBox" action="login_page_processing.php" method="POST">
				<h2 id = loginText>  Login  </h2>
				
				<p style = "margin-bottom: 1vh;">USERNAME</p>
				<div><input type="text" placeholder="Enter Username" class = "inputBox" name = "enteredUsername" id = "enteredUsername" style = "margin-top: 1vh;" value="<?php echo htmlspecialchars($_POST["enteredUsername"], ENT_QUOTES);?>"></div><br>

				<p style = "margin-top: 4.5vh; margin-bottom: 1vh;">PASSWORD</p>
				<div><input type="password" placeholder="Enter Password" class = "inputBox" name = "enteredPassword" id = "enteredPassword" style = "margin-top: 1vh;" value="<?php echo htmlspecialchars($_POST["enteredPassword"], ENT_QUOTES);?>"></div><br>

				<!--Blank error messages that become not blank if there is a problem signing in-->
				<p style = "color: green; margin-bottom: 1vh;"><?php echo $loginPageMessage; ?></p>
				<p style = "color: red; margin-bottom: 1vh;"><?php echo $loginPageError; ?></p>
				<p><button id = signInButton class = buttonStyling type="submit">Sign In</button></p>
			</form>
			<!--Link to create an account-->
			<p style = "margin-bottom: 7vh; margin-top: 4.5vh;">No account? Create one here <a href= new_account_page.php> Click here </a></p>
			<br>
		</div>
		<?php include("footer.html"); ?>
	</body>
</html>