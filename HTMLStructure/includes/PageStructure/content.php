
<section>

    <?php

    $allowed_pages = ['Home','#'];

    $allowed_main_pages = ['Home','#'];

    $allowed_sql_pages = [
        '#',
        'SQLHome'];

    $allowed_python_pages = ['NumberToWord'];

    $allowed_C_pages = ['SelfBalBinTree'];

    $allowed_java_pages = ['#'];

    $allowed_javascript_pages = ['battleship', 'sentimentAnalysis'];

    $allowed_cybersecurity_pages = ['cyberSecurityHome', 'cleanDeskPolicy', 'acceptableUsePolicy'];

    $allowed_engineering_pages = ['capabilityMaturityModel'];

    $allowed_about_me_pages = ['aboutMe'];


    if(!isset($_GET['clicked'])) {
        include 'includes/Home.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_pages)) {
        $page = $_GET['clicked'];
        include 'includes/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_C_pages)) {
        $page = $_GET['clicked'];
        include 'includes/cContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_java_pages)) {
        $page = $_GET['clicked'];
        include 'includes/JavaContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_cybersecurity_pages)) {
        $page = $_GET['clicked'];
        include 'includes/CyberSecurityContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_about_me_pages)) {
        $page = $_GET['clicked'];
        include 'includes/AboutMe/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_sql_pages)) {
        $page = $_GET['clicked'];
        include 'includes/SqlContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_python_pages)) {
        $page = $_GET['clicked'];
        include 'includes/PythonContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_javascript_pages)) {
        $page = $_GET['clicked'];
        include 'includes/JavaScriptContent/'.$page.'.php';
    }

    else if (isset($_GET['clicked']) && in_array($_GET['clicked'], $allowed_engineering_pages)) {
        $page = $_GET['clicked'];
        include 'includes/DevelopmentContent/'.$page.'.php';
    }
    else {
        include 'includes/Home.php';
    }
    ?>
</section>

