<?php

//Sets the servername variable to the local host where the server is located
$serverName = "YXg0LmguZmlsZXNzLmlv";

//Sets the user to login as root
$userName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";

//Sets the password
$password = "ZmRlMGNmODkzNzE1ZmQxMjBmMTBjNmUwZjRiYWQ3ODI5ODQ5ZDU4Zg==";

//Sets the name of the database to be connected to the company
$dbName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";

$port="3307";

//All of the above variables are passed as parameters to the connect function to create the database connection
$dbConnection = mysqli_connect(base64_decode($serverName), base64_decode($userName), base64_decode($password), base64_decode($dbName), $port);

$_SESSION['dbConnection'] = $dbConnection;

