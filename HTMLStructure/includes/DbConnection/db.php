<?php

//Sets the servername variable to the local host where the server is located
$serverName = "YXg0LmguZmlsZXNzLmlv";
$decodedServerName = base64_decode($serverName);

//Sets the user to login as root
$userName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";
$decodedUserName = base64_decode($userName);

//Sets the password
$password = "ZmRlMGNmODkzNzE1ZmQxMjBmMTBjNmUwZjRiYWQ3ODI5ODQ5ZDU4Zg==";
$decodedPass = base64_decode($password);

//Sets the name of the database to be connected to the company
$dbName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";
$decodedDB = base64_decode($dbName);

$port="3307";

//All of the above variables are passed as parameters to the connect function to create the database connection
$dbConnection = mysqli_connect($decodedServerName, $decodedUserName, $decodedPass, $decodedDB, $port);

$_SESSION['dbConnection'] = $dbConnection;

