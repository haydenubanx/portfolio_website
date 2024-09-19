<header>
    <!-- header link for index page -->
    <h1 id="Title Name"> <a href="index.php">Hayden Eubanks</a> </h1>
    <h1 id="Title Job" class="hide-on-mobile"><a href="index.php">Computer Science: Cybersecurity</a></h1>
    <div class="nav-toggle-container"><button class="nav-toggle" aria-label="Toggle navigation">&#9776;</button></div>


    <!-- Includes the navigation bar -->
    <?php include("nav.html");

    //Includes the file for processing and creating the welcome message form
    include("welcome.php");

    //If it is the first time visiting the page, display the welcome message in the header
    if (isset($_SESSION['firstTimeVisiting']) && $_SESSION['firstTimeVisiting'] == true) {
        welcomeMessage();
    }

    ?>

</header>