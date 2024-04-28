<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";

//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get the maximum and minimum salary from the employees 
			table (in that order).</blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT CONCAT('$', format(MIN(SALARY), 'C2')) AS 'Minimum Salary', CONCAT('$', format(MAX(SALARY), 'C2')) AS 'Maximum Salary'
	FROM Employees;";

//The fuction to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($dbConnection, $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<pre>' . $sqlQuery .'</pre>' .
    tableFormatting($resultNames);

?>