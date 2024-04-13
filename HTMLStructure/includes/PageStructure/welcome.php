<?php
//Function to create name submission form, print welcome message, and validate inputs
function welcomeMessage() {

    //If something has been entered for both the first adn last name fields
    if (isset($_POST['firstName']) && isset($_POST['lastName'])) {

        //Checks for invalid name entry
        if((strlen($_POST['firstName']) > 30) || (strlen($_POST['lastName']) > 30)) {
            echo('<br>'.'The name you entered is too long. Please enter a name under 30 characters.');
        }

        //Checks for no input
        else if ($_POST['firstName'] == '' || $_POST['lastName'] == ''){
            echo('<br>'.'Sorry, You forgot to enter a name!');
        }

        //Checks to ensure input data is alphabetic
        else if ((ctype_alpha($_POST['firstName']) <= 0) || (ctype_alpha($_POST['lastName']) <= 0) ) {
            echo('<br>'.'Please use alphabetic characters only.');
        }

        //If the input is valid, Sets the session variables for first name and last name
        //to the user input
        else {
            $_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
        }
    }

    //If the session variables have been set and equal the professor's name
    if ((isset($_SESSION['firstName']) &&  $_SESSION['firstName'] == "Laurie") &&
        (isset($_SESSION['lastName']) && $_SESSION['lastName'] == "Crawford") && isset($_SESSION['VisitNumber'])) {

        //Print the welcome professor statement
        echo "<br><br><p>Welcome to my site, Professor!</p><br>";

        echo "<p>You have visited my site". $_SESSION[$VisitNumber] ."times!<br/><br/><br/></p>";

        //Refresh the variable so that the sign in form will show again
        $_SESSION['ListShown'] = 0;
    }


    //Otherwise print the welcome message with the input name
    else if ((isset($_SESSION['firstName']) && isset($_SESSION['lastName']))) {
        echo "<br><br><p>Welcome to my site, ".$_SESSION["firstName"]." ".$_SESSION["lastName"]."!</p><br>";

        if (isset($_SESSION['VisitNumber']) && $_SESSION['VisitNumber'] == 1){
            echo "<p>You have visited my site ". $_SESSION['VisitNumber'] ." time!<br/><br/><br/></p>";
        }

        else if (isset($_SESSION['VisitNumber'])) {
            echo "<p>You have visited my site ". $_SESSION['VisitNumber'] ." times!<br/><br/><br/></p>";
        }

        //Refresh the variable so that the sign in form will show again
        $_SESSION['ListShown'] = 0;

    }


    //While valid input has not been entered, continue to present the welcome message form
    else if ($_SESSION['ListShown'] < 1){
        ?>
        <!--The statements for the welcome message form -->
        <form method="post" action="index.php">
            <label for="firstName">First name: </label>
            <input type="text" id="firstName" name="firstName">
            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="lastName">
            <input type="submit" value="Submit" name="submit"><br />
        </form>
    <?php }
}


?>