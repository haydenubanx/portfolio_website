<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Queries | Hayden Eubanks Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
            background-color: #f4f4f4;
        }

        /* Navigation styling */
        nav {
            background-color: #333;
            padding: 1em;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav a {
            color: white;
            margin: 0 1em;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: 700;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* SQL Section */
        .sql-section {
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
            color: #333;
        }

        .sql-section h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .sql-section p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .query-link {
            display: inline-block;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        .query-link:hover {
            background-color: #0056b3;
        }

        .query-link-close {
            display: inline-block;
            padding: 15px 30px;
            background-color: seagreen;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
            margin: 10px;
        }

        .query-link-close:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<!-- SQL Section -->
<section class="sql-section">
    <h1>SQL Queries Overview</h1>
    <p>Welcome to the SQL section of my portfolio. Here, you can explore various SQL queries that interact with the
        underlying database. Each query is designed to showcase different aspects of SQL, including data retrieval,
        updates, and analysis.</p>
    <p>Select a query below to view the details and see how it functions:</p>
    <a href="index.php?clicked=SQLHome&query=MinMaxSalaries" class="query-link"> Min & Max Salaries</a>
    <a href="index.php?clicked=SQLHome&query=NumEmployees" class="query-link"> Number of Employees</a>
    <a href="index.php?clicked=SQLHome&query=MarketingEmployees" class="query-link"> Marketing Employees</a>
    <a href="index.php?clicked=SQLHome&query=NumJobs" class="query-link"> Number of Jobs</a>
    <a href="index.php?clicked=SQLHome&query=DepartmentName" class="query-link"> Department Name</a>
    <a href="index.php?clicked=SQLHome&query=UniqueFirstNames" class="query-link"> Unique First Names</a>
    <a href="index.php?clicked=SQLHome&query=FirstThreeCharacters" class="query-link"> FirstThreeCharacters</a>
    <a href="index.php?clicked=SQLHome&query=AddEmployee" class="query-link"> Add Employee</a>
    <a href="index.php?clicked=SQLHome&query=DeleteEmployee" class="query-link"> Delete Employee</a>
</section>

<?php

$allowed_sql_pages = [
    '#',
    'CyberSecurity',
    'MinMaxSalaries',
    'AddEmployee',
    'DeleteEmployee',
    'DepartmentName',
    'FirstThreeCharacters',
    'MarketingEmployees',
    'NumEmployees',
    'NumJobs',
    'TableFormatting',
    'UniqueFirstNames'];

if (isset($_GET['query']) && in_array($_GET['query'], $allowed_sql_pages)) {
    $page = $_GET['query'];
    include 'includes/SqlContent/' . $page . '.php';

?>

<section class="sql-section">
    <a href="index.php?clicked=SQLHome" class="query-link-close"> Close Query</a>
</section>
<?php
}
?>
</body>
</html>