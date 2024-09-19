<?php

$serverName = "db5016368926.hosting-data.io";

$userName = "dbu5334433=";

$password = "ExampleDatabasePassword123!&";

$dbName = "dbs13307710";

$port="3306";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//All of the above variables are passed as parameters to the connect function to create the database connection
$dbConnection = mysqli_connect($serverName, $userName, $password, $dbName, $port);

if ($dbConnection->connect_error) {
    die('<p>Failed to connect to MySQL: '. $dbConnection->connect_error .'</p>');
}

/* Set the desired charset after establishing a connection */
$dbConnection->set_charset('utf8mb4');

$_SESSION['dbConnection'] = $dbConnection;

