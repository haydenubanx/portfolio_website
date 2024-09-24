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

        .sqlQuery {
            font-family: 'Roboto', sans-serif;
            margin: 0 1rem;
            padding: 0.5rem;
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

        /* Button in top-right corner */
        .database-design-btn {
            position: absolute;
            top: 100px;
            right: 20px;
            background-color: seagreen;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .database-design-btn:hover {
            background-color: #0056b3;
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

        .erd {
            width: 80%;
        }

        /* General Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto; /* Adjusts column width automatically */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #1eaa;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        /* Responsive table container */
        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 0.9em;
            }

            th, td {
                padding: 10px;
            }

            nav {
                padding: 0.8em;
            }

            nav a {
                font-size: 1em;
                margin: 0 0.5em;
            }

            .database-design-btn {
                top: 80px;
                right: 10px;
                padding: 8px 16px;
                font-size: 0.9em;
            }

            .sql-section {
                padding: 30px 15px;
            }

            .sql-section h1 {
                font-size: 2em;
                margin-bottom: 15px;
            }

            .sql-section p {
                font-size: 1em;
                margin-bottom: 20px;
            }

            .query-link, .query-link-close {
                padding: 12px 20px;
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            table {
                width: 100%;
                font-size: 0.85em;
            }

            th, td {
                padding: 8px;
            }

            /* Ensure table scrolls horizontally if needed */
            .table-container {
                overflow-x: auto;
                display: block;
                width: 100%;
                white-space: nowrap;
            }

            /* For really small screens, ensure tables stack properly */
            table {
                display: block;
                overflow-x: auto;
                width: 100%;
                white-space: nowrap;
            }

            nav a {
                font-size: 0.9em;
            }

            .database-design-btn {
                top: 70px;
                right: 5px;
                padding: 6px 12px;
                font-size: 0.8em;
            }

            .sql-section h1 {
                font-size: 1.8em;
            }

            .sql-section p {
                font-size: 0.9em;
            }

            .query-link, .query-link-close {
                padding: 10px 16px;
                font-size: 0.9em;
            }

            blockquote {
                font-size: 0.9em;
                word-wrap: break-word;
            }

            .table-container {
                font-size: 0.5rem;
                padding: 0;
                overflow-x: scroll;
            }
        }
    </style>
</head>
<body>

<!-- Button in top-right corner -->
<div id="content">
    <a href="index.php?clicked=SQLHome&query=DatabaseDesign" class="database-design-btn">See Database Tables</a>
</div>

<!-- SQL Section -->
<section class="sql-section">
    <h1>SQL Queries Overview</h1>
    <p>Welcome to the SQL section of my portfolio. Here, you can explore various SQL queries that interact with the
        underlying database for this site. Each query is designed to showcase different aspects of SQL, including data retrieval,
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
    'MinMaxSalaries',
    'AddEmployee',
    'DeleteEmployee',
    'DepartmentName',
    'FirstThreeCharacters',
    'MarketingEmployees',
    'NumEmployees',
    'NumJobs',
    'TableFormatting',
    'UniqueFirstNames',
    'DatabaseDesign'];

if (isset($_GET['query']) && in_array($_GET['query'], $allowed_sql_pages)) {
    $page = $_GET['query'];
    include  $page . '.php';

    ?>

    <section class="sql-section">
        <a href="index.php?clicked=SQLHome" class="query-link-close"> Close Query</a>
    </section>
    <?php
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.getElementById('content');
        const urlParams = new URLSearchParams(window.location.search);

        // Update button based on query parameter
        function updateButton() {
            if (urlParams.get('query') === 'DatabaseDesign') {
                content.innerHTML = '<a href="index.php?clicked=SQLHome" class="database-design-btn">Hide Database Tables</a>';
            } else {
                content.innerHTML = '<a href="index.php?clicked=SQLHome&query=DatabaseDesign" class="database-design-btn">See Database Tables</a>';
            }
        }

        updateButton(); // Set initial button state

        content.addEventListener('click', function(event) {
            if (event.target.matches('.database-design-btn')) {
                event.preventDefault();
                const newQuery = urlParams.get('query') === 'DatabaseDesign' ? 'SQLHome' : 'DatabaseDesign';
                window.location.href = `index.php?clicked=SQLHome&query=${newQuery}`;
            }
        });
    });
</script>

</body>
</html>