<?php

//Sets the servername variable to the local host where the server is located
$serverName = "ax4.h.filess.io";

//Sets the user to login as root
$userName = "HaydenPortfolioWebsite_eagerdeep";

//Sets the password
$password = "fde0cf893715fd120f10c6e0f4bad7829849d58f";

//Sets the name of the database to be connected to company
$dbName = "HaydenPortfolioWebsite_eagerdeep";

$port="3307";

//All of the above variables are passed as parameters to the connect function to create teh database connection
$dbConnection = mysqli_connect($serverName, $userName, $password, $dbName, $port);

$_SESSION['dbConnection'] = $dbConnection;

?>