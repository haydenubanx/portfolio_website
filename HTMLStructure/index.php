<?php
	//Starts a session so variables such as the user input for the welcome message can be remembered
	session_start();

	//Includes the database connection file for interacting with the database
	include_once 'includes/db.php';

	//Session variable to track if the sign in form has been shown so that it only shows in the header
	$_SESSION['ListShown'] = 0;

	//Declare variable to store the cookie value
$cookie_value = null;



	//If the user or timeVisited cookies have not been set
	if (!isset($_COOKIE['user']) || !isset($_COOKIE['timesVisited'])) {

			//Name for first cookie and default value
			$cookie_name = 'user';
			$cookie_value = '';

		//If the session variable for the visit number has been set
		if(isset($_SESSION['visitNumber'])) {
			$visitNumber = $_SESSION['visitNumber'];
		}

		//Else if the cookie variable has been set
		else if (isset($_COOKIE['timesVisited'])) {
			$visitNumber =  $_COOKIE['timesVisited'];
		}

		//Otherwise set the temporary variable to zero because it is the first visit
		else {
			$visitNumber = 0;
		}


		//If the cookie for timeVisited is set
		if (isset($_COOKIE['timesVisited'])) {

			//Increment visits by one
			$_COOKIE['timesVisited'] += 1;

			//Set the session variable equal to the cookie
			$_SESSION['VisitNumber'] = $_COOKIE['timesVisited'];

			//Set the variable for first visit equal to false
			$_SESSION['firstTimeVisiting'] = false;

		}

		//If the number of visits is less than or equal to the first visit
		else if ($visitNumber <= 1) {

			//Increment the temp variable by one
			$visitNumber += 1;

			//Set the session variable equal to the temp variable
			$_SESSION['VisitNumber'] = $visitNumber;

			//Set the first time visiting to true
			$_SESSION['firstTimeVisiting'] = true;

		}




		//If the first name and last name are both set
		if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

			//Set the value to be passed to the cookie to be both first and last name
			$cookie_value = $_SESSION['firstName']." ".$_SESSION['lastName'];

			//Set the name cookie
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

			//Set the times visited cookie
			setcookie('timesVisited', $_SESSION['VisitNumber'], time() + (86400 * 30), "/");

			//Set the first visit variable to false for future passes
			$_SESSION['firstTimeVisiting'] = false;

		}

	}

	//Otherwise
	else {

		//Increment the number of visits in the cookie
		$_COOKIE['timesVisited'] += 1;

		//Set the session visit number equal to the cookie
		$_SESSION['VisitNumber'] = $_COOKIE['timesVisited'];

		//Set the first time visiting variable to false
		$_SESSION['firstTimeVisiting'] = false;

		//If the first name and last name session variables are set
		if(isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

			//Set the cookie value to both the first and last names seperated by a space
			$cookie_value = $_SESSION['firstName']."&nbsp".$_SESSION['lastName'];

			//Set the cookie for names
			setcookie('user', $cookie_value, time() + (86400 * 30), "/");

			//Set the cookie for number of visits
			setcookie('timesVisited', $_SESSION['VisitNumber'], time() + (86400 * 30), "/");
		}


	}

		//If both cookies are set
		if(isset($_COOKIE['user']) && isset($_COOKIE['timesVisited'])) {

			//Variable to store the name value of the cookie
			$currentValue = $_COOKIE['user'];

			//Explode the array into both first and last names
			$cookieArray = explode("&nbsp", $currentValue);

			//If both parts of the array are set, set the session variables for both first and last name
			if (isset($cookieArray[0]) && isset($cookieArray[1]) ) {
				$_SESSION['firstName'] = $cookieArray[0];
				$_SESSION['LastName'] = $cookieArray[1];
			}
		}




?>


<!doctype html>

<html>
<head>



	<title>Hayden Eubanks PHP Project 2</title>

	<!--Links the stylesheet I created -->
	<link rel="stylesheet" href="./resources/css/style.css" />

</head>
	<body>
		<!--Adds the header file to the main page-->
		<?php include("./includes/header.php"); ?>


		<?php $_SESSION['ListShown'] = 1; ?>


<!--Pre-formatted text containing my introduction.-->
<pre>
	    		Welcome to my Project 2:Queries, Add, Delete, Cookies Assignment! To perform a query, select the desired query
 		question from the navigation list above. This is the main page of the website and by clicking on the different options above,
		this page dynamically changes as queries are performed and presented. When a query is clicked, the question the query is answering
		will be presented in orange and the query itself will be presented in a box below that and then a table containing the query results.
		When you log in to the login section at the top of the page, cookies will be created to track the name that was entered and the ammount
		of times the site has been visited. A welcome message will be displayed upon the first time a user logs into the site and then will be
		only displayed in the footer of the page with the visit counter from that point onward.

</pre>

		<!--Includes the content file for the dynamically changing content-->
		<?php include("./includes/content.php"); ?>

		<!--Adds the footer file to the main page-->
		<?php include("./includes/footer.php"); ?>

	</body>
</html>