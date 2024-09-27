<?php
require __DIR__.'/includes/JavaScriptContent/Ship.php';
	//Starts a session so variables such as the user input for the welcome message can be remembered
	session_start();

	//Includes the database connection file for interacting with the database
	include_once 'includes/DbConnection/db.php';

	//Session variable to track if the sign-in form has been shown so that it only shows in the header
	$_SESSION['ListShown'] = 0;

	//Declare variable to store the cookie value
$cookie_value = null;


function updateVisitCount()
{
    $visitNumber = 0;

    if (isset($_COOKIE['timesVisited'])) {
        $visitNumber = $_COOKIE['timesVisited'];
        $visitNumber += 1;
    } else {
        $visitNumber = $_SESSION['visitNumber'] ?? (isset($_COOKIE['timesVisited']) ? $_COOKIE['timesVisited'] : 0);
        $visitNumber += 1;
    }
    $_SESSION['visitNumber'] = $_COOKIE['timesVisited'] ?? $visitNumber;
    $_SESSION['firstTimeVisiting'] = $visitNumber <= 1;
}

function setVisitCookies($cookieName, $cookieValue)
{
    if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
        $cookieValue = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
        setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/");
        setcookie('timesVisited', $_SESSION['VisitNumber'], time() + (86400 * 30), "/");
        $_SESSION['firstTimeVisiting'] = false;
    }
}


//$cookie_value = null;
//$cookie_name = 'user';
//
//if (!isset($_COOKIE['user']) || !isset($_COOKIE['timesVisited']) || !isset($_COOKIE['firstName']) || !isset($_COOKIE['lastName'])) {
//    updateVisitCount();
//    setVisitCookies($cookie_name, $cookie_value);
//}
//else {
//    updateVisitCount();
//    setVisitCookies('user', $_SESSION['firstName'] . "&nbsp" . $_SESSION['lastName']);
//}
//
//// Other parts of the code...
//
//		//If both cookies are set
//		if(isset($_COOKIE['user']) && isset($_COOKIE['timesVisited'])) {
//
//			//Variable to store the name value of the cookie
//			$currentValue = $_COOKIE['user'];
//
//			//Explode the array into both first and last names
//			$cookieArray = explode("&nbsp", $currentValue);
//
//			//If both parts of the array are set, set the session variables for both first and last name
//			if (isset($cookieArray[0]) && isset($cookieArray[1]) ) {
//				$_SESSION['firstName'] = $cookieArray[0];
//				$_SESSION['LastName'] = $cookieArray[1];
//			}
//		}




?>


<!doctype html>

<html>
<head>



	<title>Hayden Eubanks Portfolio</title>

	<!--Links the stylesheet I created -->
	<link rel="stylesheet" href="./resources/css/style.css" />
    <link rel="icon" href="../../resources/images/favicon.png">
    <script src="https://kit.fontawesome.com/d6bcb154dc.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navToggle = document.querySelector('.nav-toggle');
            const navLinks = document.querySelector('.navbar');

            // Toggle the 'show' class on click
            navToggle.addEventListener('click', function() {
                navLinks.classList.toggle('show');
            });
        });
    </script>

</head>
	<body>
		<!--Adds the header file to the main page-->
		<?php include("./includes/PageStructure/header.php"); ?>


		<?php $_SESSION['ListShown'] = 1; ?>



		<!--Includes the content file for the dynamically changing content-->
		<?php include("./includes/PageStructure/content.php"); ?>

		<!--Adds the footer file to the main page-->
		<?php include("./includes/PageStructure/footer.php"); ?>

	</body>
</html>