<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <title>Expandable Code Box</title>-->
</head>
<body>

<?php


//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>This form accepts a number and adds it to a binary search tree while updating the tree so that it remains balanced</blockquote>";


//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';

function submitSelfBalBinTreeForm() {
    if (isset($_POST['SelfBalBinTree'])) {

        if (strlen($_POST['SelfBalBinTree']) > 50) {
            echo('<br>' . 'The value you entered is too long. Please re-enter a value that is under 50 characters.');
        } else {
            $_SESSION['SelfBalBinTree'] = $_POST['SelfBalBinTree'];
        }

    }


    ?>

    <h1>My C++ Code</h1>
    <div class="code-container">
        <button class="toggle-button" onclick="toggleCode()">Show Code</button>
        <pre id="code-box" class="code-box"><code class="language-cpp">
            <?php
            // Read the contents of the C++ file and display it
            $cpp_code = file_get_contents(__DIR__.'/SelfOrganizingList/ThreadedBinaryTreeDriver.cpp');
            echo htmlspecialchars($cpp_code);
            ?>
        </code></pre>
    </div>

    <h2>Output</h2>
    <pre>
        <?php
        // Define the path to the C++ file
        $cpp_file = __DIR__.'/SelfOrganizingList/ThreadedBinaryTreeDriver.cpp';
        $output_file = __DIR__.'/SelfOrganizingList/output.txt';

        // Compile the C++ code
        $compile_command = "g++ $cpp_file -o output && ./output > $output_file";
        shell_exec($compile_command);

        // Read and display the output
        $output = file_get_contents($output_file);
        echo htmlspecialchars($output);
        ?>
    </pre>


    <form method="post" action="index.php?clicked=SelfBalBinTree">
        <label for="SelfBalBinTree">Input a Number: </label>
        <input type="text" id="SelfBalBinTree" name="SelfBalBinTree"> <br /><br />
        <input type="submit" value="Submit" name="submit" onclick="submitSelfBalBinTreeForm()" ><br /><br /><br />
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-cpp.min.js"></script>
<script  src="/HTMLStructure/includes/cContent/Scripts/expand-box.js" ></script>

</body>
</html>

    <?php
}

submitSelfBalBinTreeForm();

if (isset($_SESSION['SelfBalBinTree']) and $_SESSION['SelfBalBinTree'] != "") {

    ?>

<!--     TODO: Execute C++ Code-->

<?php }

