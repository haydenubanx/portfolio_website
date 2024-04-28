<?php

//Include statements for the database connection and formatting output file
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";




//The question as written in the assignment being output to the screen
$question = "<blockquote>Write a query to get the number of employees working in the Marketing 
					department with a job title of Marketing Manager. </blockquote>";

//The query to be passed
$sqlQuery = "
	SELECT COUNT(DISTINCT employees.Employee_ID) AS 'Number of Marketing Managers'
	FROM Employees, jobs, departments
	WHERE (employees.department_ID = departments.department_ID) AND (departments.department_name = 'Marketing') AND
	 (employees.job_ID = jobs.Job_ID) AND (jobs.Job_Title = 'Marketing Manager');";

//The statement which actually performs the query
$resultNames= mysqli_query($dbConnection, $sqlQuery);

//Prints the question and query and calls function to print table of results
echo '<p><strong>' . $question . '</strong></p>' .
    '<pre>' . $sqlQuery .'</pre>' .
    tableFormatting($resultNames);

?>