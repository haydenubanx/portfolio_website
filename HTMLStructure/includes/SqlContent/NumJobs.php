<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get the number of different types of 
			jobs available in the employees table.</blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT COUNT(DISTINCT Job_ID) AS 'Number of Different Jobs'
	FROM employees";

//The function to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($_SESSION['dbConnection'], $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<p class="sqlQuery">' . $sqlQuery .'</p>' .
    tableFormatting($resultNames);


?>