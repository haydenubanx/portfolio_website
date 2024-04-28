<?php


//Include statements for the database connection and output formatting
include 'TableFormatting.php';
include_once __DIR__ . "/../DbConnection/db.php";


//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>Use This Page to Add a New Employee.</blockquote>";


//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';


//Function to create name submission form, print welcome message, and validate inputs
function AddEmployeeForm() {


    //If something has been entered for all fields
    if (isset($_POST['addedFirstName']) && isset($_POST['addedLastName']) && isset($_POST['email']) &&
        isset($_POST['phoneNumber']) && isset($_POST['hireDate']) && isset($_POST['jobID']) &&
        isset($_POST['salary']) && isset($_POST['commissionPCT']) && isset($_POST['managerID']) &&
        isset($_POST['departmentID'])) {

        //Checks for invalid name entry over 50 characters
        if((strlen($_POST['addedFirstName']) > 50) || (strlen($_POST['addedLastName']) > 50) ||
            (strlen($_POST['email']) > 50) || (strlen($_POST['phoneNumber']) > 50) ||
            (strlen($_POST['hireDate']) > 50) || (strlen($_POST['jobID']) > 50) ||
            (strlen($_POST['salary']) > 50) || (strlen($_POST['commissionPCT']) > 50) ||
            (strlen($_POST['managerID']) > 50) || (strlen($_POST['departmentID']) > 50)) {
            echo('<br>'.'One of the fields you entered is too long. Please enter all fields in under 50 characters.');
        }


        //Checks for date validity
        else if (checkdate($_POST['hireDate']) == false) {

            echo('<br>'.'Sorry, The date you entered is incorrect!');
        }


        //Checks for no input
        else if ($_POST['addedFirstName'] == "" || $_POST['addedLastName'] == "" || $_POST['email'] == "" ||
            $_POST['phoneNumber'] == "" || $_POST['hireDate'] == "" || $_POST['jobID'] == ""
            || $_POST['salary'] == "" || $_POST['commissionPCT'] == "" || $_POST['managerID'] == ""
            || $_POST['departmentID'] == ""){
            echo('<br>'.'Sorry, You forgot to enter a field!');
        }

        //Checks to ensure input data  fields is alphabetic
        else if ((ctype_alpha($_POST['addedFirstName']) <= 0) || (ctype_alpha($_POST['addedLastName']) <= 0) ) {
            echo('<br>'.'Please use alphabetic characters for name.');
        }

        //If the input is valid, Sets the session variables for all fields
        //to the user input
        else {
            $_SESSION['addedFirstName'] = $_POST['addedFirstName'];
            $_SESSION['addedLastName'] = $_POST['addedLastName'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
            $_SESSION['hireDate'] = $_POST['hireDate'];
            $_SESSION['jobID'] = $_POST['jobID'];
            $_SESSION['salary'] = $_POST['salary'];
            $_SESSION['commissionPCT'] = $_POST['commissionPCT'];
            $_SESSION['managerID'] = $_POST['managerID'];
            $_SESSION['departmentID'] = $_POST['departmentID'];
        }
    }


    //While valid input has not been entered, continue to present the welcome message form

    ?>
    <!--The statements for the welcome message form -->
    <form method="post" action="index.php?clicked=AddEmployee">
        <label for="addedFirstName">First name: </label>
        <input type="text" id="addedFirstName" name="addedFirstName"> <br /><br />
        <label for="addedLastName">Last name:</label>
        <input type="text" id="addedLastName" name="addedLastName"><br /><br />
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br /><br />
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber"><br /><br />
        <label for="hireDate">Hire Date:</label>
        <input type="text" id="hireDate" name="hireDate"><br /><br />
        <label for="jobID">Job ID:</label>
        <input type="text" id="jobID" name="jobID"><br /><br />
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary"><br /><br />
        <label for="commissionPCT">Commission Percentage:</label>
        <input type="text" id="commissionPCT" name="commissionPCT"><br /><br />
        <label for="managerID">Manager ID:</label>
        <input type="text" id="managerID" name="managerID"><br /><br />
        <label for="departmentID">Department ID:</label>
        <input type="text" id="departmentID" name="departmentID"><br /><br />
        <input type="submit" value="Submit" name="submit" onclick="AddEmployeeForm()" ><br /><br /><br />
    </form>
<?php }



//Function call to the welcome message function
AddEmployeeForm();

//if all variables are set
if (isset($_SESSION['addedFirstName']) && isset($_SESSION['addedLastName']) && isset($_SESSION['email']) && isset($_SESSION['phoneNumber']) &&
    isset($_SESSION['hireDate']) && isset($_SESSION['jobID']) && isset($_SESSION['salary']) && isset($_SESSION['commissionPCT']) &&
    isset($_SESSION['managerID']) && isset($_SESSION['departmentID'])) {

    if($_SESSION['addedFirstName'] != "" && $_SESSION['addedLastName'] != "" && $_SESSION['email'] != "" &&
        $_SESSION['phoneNumber'] != "" && $_SESSION['hireDate'] != "" && $_SESSION['jobID'] != ""
        && $_SESSION['salary'] != "" && $_SESSION['commissionPCT'] != "" && $_SESSION['managerID'] != ""
        && $_SESSION['departmentID'] != ""){

        //Query to retrieve the highest number so far in the Primary Key
        $sqlIncrementValueQuery = "SELECT MAX(employee_id) FROM employees;";

        //Variable to store the number of highest primary key
        $valueToIncrement = mysqli_query($_SESSION['dbConnection'], $sqlIncrementValueQuery);

        //An array to store the contents of the employ that is to be added to the database
        $incrementValueArray = mysqli_fetch_row($valueToIncrement);

        //Increments the primary key one above the highest
        $incrementValue = $incrementValueArray[0] + 1;

        //The query to be passed to the database
        $sqlQuery = "INSERT INTO employees 
				 VALUES( '".$incrementValue."' , '".$_SESSION['addedFirstName']."' , '".$_SESSION['addedLastName']."' , '".$_SESSION['email']."' , '".$_SESSION['phoneNumber']."' , '".
            $_SESSION['hireDate']."' , '".$_SESSION['jobID']."' , '".$_SESSION['salary']."' , '".$_SESSION['commissionPCT']."' , '".
            $_SESSION['managerID']."' , '".$_SESSION['departmentID']."');";

        //Run the first query to add the name
        mysqli_query($_SESSION['dbConnection'], $sqlQuery);

        //Second Query for retrieving entered name
        $secondSqlQuery = "SELECT employee_ID AS 'Employee ID', first_name AS 'First Name', 
			last_name AS 'Last Name', email AS 'Email', phone_number AS 'Phone Number', 
			hire_date AS 'Hire Date', job_ID AS 'Job ID', salary AS 'Salary', commission_pct AS 'Commission Percentage',
		 	manager_ID AS 'Manager ID', department_ID AS 'Department ID'
					FROM employees
					WHERE first_name = '". $_SESSION['addedFirstName'] . "' AND last_name = '" . $_SESSION['addedLastName']."' ;";
    }

}

//Checks that the second query is set
if(isset($secondSqlQuery)) {
    //The fuction to perform the query and store the results in the resultNames variable
    $resultNames= mysqli_query($_SESSION['dbConnection'], $secondSqlQuery);


    //The print statement for the question, query, and function call to print statement for the table
    echo tableFormatting($resultNames);
}

//If a first name has been added into the field set the session variable to that value
if (isset($_SESSION['addedFirstName'])) {
    $_SESSION['addedFirstName'] = "";
}

//If a last name has been added into the field set the session variable to that value
if (isset($_SESSION['addedLastName'])) {
    $_SESSION['addedLastName'] = "";
}

//If an email has been added into the field set the session variable to that value
if (isset($_SESSION['email'])) {
    $_SESSION['email'] = "";
}

//If a phone number has been added into the field set the session variable to that value
if (isset($_SESSION['phoneNumber'])) {
    $_SESSION['phoneNumber'] = "";
}

//If a hire date has been added into the field set the session variable to that value
if (isset($_SESSION['hireDate'])) {
    $_SESSION['hireDate'] = "";
}

//If a job ID has been added into the field set the session variable to that value
if (isset($_SESSION['jobID'])) {
    $_SESSION['jobID'] = "";
}

//If a salary has been added into the field set the session variable to that value
if (isset($_SESSION['salary'])) {
    $_SESSION['salary'] = "";
}

//If a commission percentage has been added into the field set the session variable to that value
if (isset($_SESSION['commissionPCT'])) {
    $_SESSION['commissionPCT'] = "";
}

//If a manager ID has been added into the field set the session variable to that value
if (isset($_SESSION['managerID'])) {
    $_SESSION['managerID'] = "";
}

//If a Department ID has been added into the field set the session variable to that value
if (isset($_SESSION['departmentID'])) {
    $_SESSION['departmentID'] = "";
}

?>