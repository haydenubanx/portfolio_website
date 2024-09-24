<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";


?>
<!-- SQL Section -->
<section class="sql-section">
    <h1>Database Tables</h1>
    <p>Select a table below to view its contents</p>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=employees" class="query-link"> Employees</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=countries" class="query-link"> Countries</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=departments" class="query-link"> Departments</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=job_history" class="query-link"> Job History</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=jobs" class="query-link"> Jobs</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=locations" class="query-link"> Locations</a>
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign&table=regions" class="query-link"> Regions</a>
</section>

<?php

$allowed_tables = [
    'employees',
    'countries',
    'departments',
    'job_history',
    'jobs',
    'locations',
    'regions'];

$table = "employees";

if (isset($_GET['table']) && in_array($_GET['table'], $allowed_tables)) {
    $table = $_GET['table'];
}

//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Query to return each table</blockquote>";

//The query to be passed
$sqlQuery = 'SELECT * FROM' . " ".$table;

//The statement which actually performs the query
$resultNames= mysqli_query($_SESSION['dbConnection'], $sqlQuery);

//Prints the question and query and calls function to print table of results
echo '<p><strong>' . $question . '</strong></p>' .
    '<p class="sqlQuery">' . $sqlQuery .'</p>' .
    tableFormatting($resultNames);

?>