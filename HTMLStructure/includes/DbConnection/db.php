<?php

$serverName = "YXg0LmguZmlsZXNzLmlv";

$userName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";

$password = "ZmRlMGNmODkzNzE1ZmQxMjBmMTBjNmUwZjRiYWQ3ODI5ODQ5ZDU4Zg==";

$dbName = "SGF5ZGVuUG9ydGZvbGlvV2Vic2l0ZV9lYWdlcmRlZXA=";

$port="3307";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//All of the above variables are passed as parameters to the connect function to create the database connection
$dbConnection = mysqli_connect(base64_decode($serverName), base64_decode($userName), base64_decode($password), base64_decode($dbName), $port);

/* Set the desired charset after establishing a connection */
$dbConnection->set_charset('utf8mb4');

$_SESSION['dbConnection'] = $dbConnection;

if ($dbConnection->connect_error) {
    die('<p>Failed to connect to MySQL: '. $dbConnection->connect_error .'</p>');
}

