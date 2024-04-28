
<section>

    <?php

    $allowed_pages = [
        'Home',
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
        'sqlHome',
        'TableFormatting',
        'UniqueFirstNames'];

    // And so on for all your pages...

    if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_pages)) {
        $page = $_GET['clicked'];
        include 'includes/SqlContent/'.$page.'.php';
    }
    ?>
</section>

