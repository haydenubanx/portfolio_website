<header>
    <!-- header link for index page -->
    <h1 id="Title Name"> <a href="index.php">Hayden Eubanks</a> </h1>
    <h1 id="Title Job" class="hide-on-mobile"><a href="index.php">Computer Science: Cybersecurity</a></h1>



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

<style>
    /* CSS to hide the "Title Job" on mobile screens */
    @media (max-width: 768px) {
        .hide-on-mobile {
            display: none;
        }
    }
</style>