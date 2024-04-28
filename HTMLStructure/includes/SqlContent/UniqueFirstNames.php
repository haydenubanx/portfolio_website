<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get all unique first names that start with the letter P 
			from the employees table.  Output the names in all upper case. Sort the results 
			in ascending order.</blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT DISTINCT UPPER(first_name) AS 'First Name'
	FROM employees
	WHERE first_name LIKE 'P%'
	ORDER BY first_name ASC;";

//The fuction to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($_SESSION['dbConnection'], $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<pre>' . $sqlQuery .'</pre>' .
    tableFormatting($resultNames);


?>