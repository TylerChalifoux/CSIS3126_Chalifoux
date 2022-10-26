<!DOCTYPE html>
<html>
	<head>
		<title> Find A Loop </title>
		<link rel="stylesheet" href="mainStyling.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="landPage.js"></script>

	</head>

	<body>
		<div id = logo><a href = index.php><img src = "Icons/Logo.png"></a></div>
		<div id = topMargin>Find a Loop</div>
		<br><br><br><br>
		<div id = "userInputAreaCenterBox">
			<h2 id = loginText>  Login  </h2>
			<p style = "margin-bottom: 2px;">USERNAME</p>
			<p><input type = "text" placeholder="Enter Username" class = mobileStyleBox style = "margin-top: 2px;"></P>
			<p style = "margin-bottom: 2px;">PASSWORD</p>
			<p><input type = "password" placeholder="Enter Password" class = mobileStyleBox style = "margin-top: 2px;"></P>

            <p style = "color: green; margin-bottom: 1em;"><?php echo $loginPageMessage ?></p>
			<P><button type="button" id = signInButton class = mobileButton style = "margin-top: 1em;">Sign In</button>
			<br><br>
			<p style = "margin-bottom: 2px; margin-bottom: 2px;">No account? Create one here</p>
			<a href= new_account_page.php> Click here </a>

			<br><br><br></p>
		</div>
	</body>

</html>