<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get the first 3 characters of all last names that start 
			with an H from the employees table and sort them in descending order.</blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT SUBSTR(Last_Name,1,3) AS 'Last Name'
	FROM employees
	WHERE last_name LIKE 'H%'
	ORDER BY Last_Name DESC;";

//The fuction to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($_SESSION['dbConnection'], $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<p class="sqlQuery">' . $sqlQuery .'</p>' .
    tableFormatting($resultNames);


?>