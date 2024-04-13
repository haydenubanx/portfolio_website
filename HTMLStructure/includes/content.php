




<section>

    <?php
    //If the clicked parameter in the url is 'MinMaxSalaries' include that file to the content section
    if (isset($_GET['clicked']) &&  $_GET['clicked'] == 'MinMaxSalaries') {
        include 'MinMaxSalaries.php';
    }

    //If the clicked parameter in the url is 'NumEmployees' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'NumEmployees') {
        include 'NumEmployees.php';
    }

    //If the clicked parameter in the url is 'MarketingEmployees' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'MarketingEmployees') {
        include 'MarketingEmployees.php';
    }

    //If the clicked parameter in the url is 'NumJobs' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'NumJobs') {
        include 'NumJobs.php';
    }

    //If the clicked parameter in the url is 'DepartmentName' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'DepartmentName') {
        include 'DepartmentName.php';
    }

    //If the clicked parameter in the url is 'UniqueFirstNames' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'UniqueFirstNames') {
        include 'UniqueFirstNames.php';
    }

    //If the clicked parameter in the url is 'FirstThreeCharacters' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'FirstThreeCharacters') {
        include 'FirstThreeCharacters.php';
    }

    //If the clicked parameter in the url is 'AddEmployee' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'AddEmployee') {
        include 'AddEmployee.php';
    }

    //If the clicked parameter in the url is 'DeleteEmployee' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'DeleteEmployee') {
        include 'DeleteEmployee.php';
    }
    ?>
</section>

