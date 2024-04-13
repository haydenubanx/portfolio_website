
<section>

    <?php

    if (isset($_GET['clicked']) &&  ($_GET['clicked'] == 'Home' || $_GET['clicked'] == '#')) {
        include '../landingPage.php';
    }

    else if (isset($_GET['clicked']) &&  $_GET['clicked'] == 'CyberSecurity') {
        include '../CyberSecurityContent/cyberSecurityHome.php';
    }

    else if (isset($_GET['clicked']) &&  $_GET['clicked'] == 'CyberSecurity') {
        include '../CyberSecurityContent/cyberSecurityHome.php';
    }

    //If the clicked parameter in the url is 'MinMaxSalaries' include that file to the content section
    else if (isset($_GET['clicked']) &&  $_GET['clicked'] == 'MinMaxSalaries') {
        include '../SqlContent/MinMaxSalaries.php';
    }

    //If the clicked parameter in the url is 'NumEmployees' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'NumEmployees') {
        include '../SqlContent/NumEmployees.php';
    }

    //If the clicked parameter in the url is 'MarketingEmployees' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'MarketingEmployees') {
        include '../SqlContent/MarketingEmployees.php';
    }

    //If the clicked parameter in the url is 'NumJobs' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'NumJobs') {
        include '../SqlContent/NumJobs.php';
    }

    //If the clicked parameter in the url is 'DepartmentName' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'DepartmentName') {
        include '../SqlContent/DepartmentName.php';
    }

    //If the clicked parameter in the url is 'UniqueFirstNames' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'UniqueFirstNames') {
        include '../SqlContent/UniqueFirstNames.php';
    }

    //If the clicked parameter in the url is 'FirstThreeCharacters' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'FirstThreeCharacters') {
        include '../SqlContent/FirstThreeCharacters.php';
    }

    //If the clicked parameter in the url is 'AddEmployee' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'AddEmployee') {
        include '../SqlContent/AddEmployee.php';
    }

    //If the clicked parameter in the url is 'DeleteEmployee' include that file to the content section
    else if (isset($_GET['clicked']) && $_GET['clicked'] == 'DeleteEmployee') {
        include '../SqlContent/DeleteEmployee.php';
    }
    if (isset($_GET['clicked']) &&  $_GET['clicked'] == 'AboutMe') {
        include '../AboutMe/aboutMe.php';
    }
    ?>
</section>

