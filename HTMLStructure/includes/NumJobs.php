<?php
//Include statements for the database connection and output formatting
include 'tableFormatting.php';
include_once 'db.php';




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get the number of different types of 
			jobs available in the employees table.</blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT COUNT(DISTINCT Job_ID) AS 'Number of Different Jobs'
	FROM employees";

//The fuction to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($dbConnection, $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<pre>' . $sqlQuery .'</pre>' .
    tableFormatting($resultNames);


?>