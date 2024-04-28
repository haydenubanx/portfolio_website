<?php

//Sets the servername variable to the local host where the server is located
$serverName = "sql8.freesqldatabase.com";

//Sets the user to login as root
$userName = "sql8702603";

//Sets the password
$password = "YFBhAhJQA5";

//Sets the name of the database to be connected to company
$dbName = "sql8702603";

//All of the above variables are passed as parameters to the connect function to create teh database connection
$dbConnection = mysqli_connect($serverName, $userName, $password, $dbName);

?>