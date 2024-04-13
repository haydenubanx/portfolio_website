<?php
//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once 'db.php';




//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Use This Page to Delete an existing Employee.</blockquote>";



//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';


//If the dialog box for no is clicked, set the session variables to zero to refresh for new entery
if (isset($_POST['no'])) {
    $_SESSION['IDToCheck'] = '';
    $_POST['employeeID'] = '';

}

//Otherwise if it was yes, delete the employee and inform the user
else if(isset($_POST['yes'])) {
    echo "<p>Employee has been deleted.</p>";

    //SQL statement to delete the employee
    $sqlDelete = "DELETE FROM employees WHERE employee_ID = '".$_SESSION['IDToCheck']."';";

    //Set the variables to empty to refresh them for new entery
    $_SESSION['IDToCheck'] = '';
    $_POST['employeeID'] = '';

    //Run the delete query on the database
    mysqli_query($dbConnection, $sqlDelete);

    //New query to search and confirm the deleted employee
    $sqlQuery = "SELECT * 
					 FROM employees 
					 WHERE employee_ID = '".$_SESSION['IDToCheck']."' ;";

    //Runs the query on the database
    $results = mysqli_query($dbConnection, $sqlQuery);
    echo tableFormatting($results);

    if(empty($results)) {
        echo "<p>No results to display.<p/>";
    }



}





//Function to create name submission form, print welcome message, and validate inputs
function AddEmployeeForm() {






    //While valid input has not been entered, continue to present the welcome message form

    ?>
    <!--The statements for the welcome message form -->
    <form method="post" action="index.php?clicked=DeleteEmployee">
        <label for="employeeID">Employee ID: </label>
        <input type="text" id="employeeID" name="employeeID"> <br /><br />
        <input type="submit" value="Submit" name="submit"><br /><br /><br />
    </form>
    <?php




}




//Calls the function to add the employee form
AddEmployeeForm();

//If the employee ID has been set and is not empty set it to the session variable
if (isset($_POST['employeeID']) && ($_POST['employeeID'] != '')) {
    $_SESSION['IDToCheck'] = $_POST['employeeID'];
}
//If the session variable is set and accurate query the database
if( isset($_SESSION['IDToCheck']) && is_numeric($_SESSION['IDToCheck']) && $_SESSION['IDToCheck'] != '') {


    //The query to be passed to the database
    $sqlQuery = "SELECT * 
					 FROM employees 
					 WHERE employee_ID = '".$_SESSION['IDToCheck']."' ;";


    //The fuction to perform the query and store the results in the resultNames variable
    $resultNames= mysqli_query($dbConnection, $sqlQuery);

    //Echo employee queried for confirmation
    echo tableFormatting($resultNames);
    echo "<br/><p>Is this the employee you would like to delete?</p>"."<br/>";

    //Echo the new form for selecting if the employee should be deleted
    echo "<form method='post' action='index.php?clicked=DeleteEmployee'>
				<input type='submit' value='Yes' name='yes'>
				<input type='submit' value='No' name='no'><br /><br /><br />
			</form>";


}







?>