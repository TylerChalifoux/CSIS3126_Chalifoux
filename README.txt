-----------------FIND A LOOP web app-------------------

CURRENT BUILD INFORMATION (Updated 12/12)----------------------------------
- Online URL is: https://tchalifoux.jwuclasses.com/

------------------Re-creating the app---------------------------------------
1) Hosting:
	- Almost all pages are PHP which require hosting to run properly. Any hosting
	platform would work for the project and the hosting service does not impact
	the project

2) Databse: 
	- The project uses an SQL database for the storage of it's users and loops. How
	to recreate this databse can be found the file titled "findALoopSQL" posted on
	GitHub.
	- If a new host for the database were to be used, only the variable "$connection" found in the
	global file would need to be changed. This variable stores the host, username, password, 
	and database name. If a new host were used, the host, username, and password would need to
	change but the database name can remain the same as the SQL file uses that name. Once this
	variable is upadated and the SQL is created, the project will work normally again.

3) API's:
	- The Google API was used extensivly during this project. This is the API used to make the map and use
	the coordinates.
	- Each of the Google API's require a slightly different URL to post to but the key is all the same for the account
	- My current Google API key will not be shown in this file but can be found in the code as documented below
	- Only two different API's were used throughout the project:
		-Static Map - for creating a map with lines in it from a string of coordinates
			-URL: https://maps.googleapis.com/maps/api/staticmap
		-Geocode - for taking in coordinates and telling you the town and state
			-URL: https://maps.googleapis.com/maps/api/geocode/json?
	-The URL's for these remain unchanged no matter the key. Each function using the API has variables seperating the 
	URL from the key to easily allow a key to be changed. 
	-If a different key were to be used, all of the functions using the API would need there key changed. The function to create
	a map is always called "showMap" and only the key variable in that function would need to change. This function can be found in
	the all of the following files. The geocode API was used only once and is in the "mobile.js" file
		-Index.js
		-map_info.js
		-mobile.js
		-profile_page.js
		-search_page.js

------------------Created webpages and what they do------------------------

1) Index page:
	-Slide show showing stock images
	-General information about the app
	-Two buttons for log in and sign up
	

2) Create an account page:
	-Allows users to create an account
	-Account is added to database
	-Username and passwords are checked for eligibility
	-Gives good looking error messages
	-All user inputs are cleaned
	-Design is done for mobile and desktop

3) Login page:
	-Allows users to login correctly
	-Correctly checks database for user accounts
	-Gives good looking error messages
	-All user inputs are cleaned
	-Design is done for mobile and desktop
	
4) Home page:
	-Shows nearby loops (Clicking a loop brings user to more info)
	-Allows for users to search for loops (brings to search page)
	-Design is done for mobile and desktop
	-Has two buttons, one for the users profile and one for the stopwatch

5) Search page:
	-Shows loops in the town the user entered (Clicking a loop brings user to more info)
	-Design is done for mobile and desktop

6) Stopwatch page:
	-Works as a normal stopwatch
	-Logs users location data every 5 seconds
	-Has the tribute to my late dog (sadie(the goodest girl))  :(
	-Designs looks good for mobile and gives an alert for desktop users

7) Profile page:
	-Displays all routes that user has liked
	-Allows the user to log out
	-Design is done for mobile and desktop

8) More loop info:
	-Shows a larger picture of the loop
	-Shows text about the loop
	-Allows the user to like a loop
	-Design is done for mobile and desktop


------------------Other files and there purpose----------------------------------

1) verifyLoggedIn:
	-When included on the top of a file, will redirect users not logged in to the index page

2) Support form page:
	-Can only be accessed from the link in the footer
	-Supplies only the best customer service for our guests ;)

3) Main styling:
	-A general CSS file for some of the commonly used things like the logo

4) Global:
	-Connects to the database
	-Starts a session with the user
	-Has one function allowing the user to sign out


