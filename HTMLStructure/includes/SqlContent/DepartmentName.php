<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Write a query to get the department name for all employees. Include the 
			employee’s first name, last name, and department name in your output (In that order).
			Sort the list by department name in ascending order, then by employee last name in 
			ascending order and employee first name in ascending order (this query uses multiple 
			tables). </blockquote>";

//The query to be passed to the database
$sqlQuery = "
	SELECT employees.First_NAME AS 'First Name', employees.Last_Name AS 'Last Name', departments.department_name AS 'Department Name'
	FROM employees, departments
	WHERE (employees.department_ID = departments.department_ID)
	ORDER BY departments.department_name ASC, employees.Last_Name ASC, employees.Last_Name ASC;";

//The fuction to perform the query and store the results in the resultNames variable
$resultNames= mysqli_query($_SESSION['dbConnection'], $sqlQuery);

//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>' .
    '<pre>' . $sqlQuery .'</pre>' .
    tableFormatting($resultNames);


?>