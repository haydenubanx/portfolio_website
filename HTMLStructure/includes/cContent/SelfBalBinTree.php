<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Balancing BST</title>
</head>
<body>

<?php


//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>This form accepts a number and adds it to a binary search tree while updating the tree so that it remains balanced</blockquote>";


//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';

function addValueToTreeForm()
{
    if (isset($_POST['keyToAdd']) && isset($_POST['valueToAdd'])) {

        if (strlen($_POST['keyToAdd']) > 5) {
            echo('<br>' . 'The value you entered is too large. Please re-enter a value that is under 5 digits.');
        } else {
            $_SESSION['keyToAdd'] = $_POST['keyToAdd'];
            $_SESSION['valueToAdd'] = $_POST['valueToAdd'];
        }
    }

}

function removeValueFromTreeForm()
{
    if (isset($_POST['keyToRemove'])) {

        if (strlen($_POST['keyToRemove']) > 5) {
            echo('<br>' . 'The value you entered is too large. Please re-enter a value that is under 5 digits.');
        } else {
            $_SESSION['keyToRemove'] = $_POST['keyToRemove'];
        }
    }

}


?>

<h1>Binary Tree Visualization</h1>
<div id="tree-container" class="tree"></div>

<?php
$file_path = __DIR__ . '/SelfOrganizingList/OutputData.txt'; // Path to the file containing the C++ output

$treeLevels = array();

if (file_exists($file_path)) {
    $file = fopen($file_path, "r");

    while (($line = fgets($file)) !== false) {
        $nodes = explode(' ', trim($line)); // Split the line into an array of nodes
        $level = array();

        foreach ($nodes as $node) {
            $pair = explode(',', $node);
            if (count($pair) == 2) {
                $level[] = array('key' => $pair[0], 'value' => $pair[1]);
            }
        }

        $treeLevels[] = $level;
    }

    fclose($file);
} else {
    echo '<p>Unable to read tree data from file.</p>';
}

echo '<script>';
echo 'var treeLevels = ' . json_encode($treeLevels) . ';';
echo '</script>';
?>


<h1>C++ Code For Self Balancing Binary Tree Driver</h1>
<div class="code-container">
    <button class="toggle-button" onclick="toggleCode()">Show Code</button>
    <pre id="code-box" class="code-box"><code class="language-cpp"><?php
            // Read the contents of the C++ file and display it
            $cpp_code = file_get_contents(__DIR__ . '/SelfOrganizingList/ThreadedBinaryTreeDriver.cpp');
            echo htmlspecialchars(trim($cpp_code));
            ?>
        </code></pre>
</div>

<h2>Output</h2>
<pre><?php

    $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';

    // Define the path to the C++ file
    if(isset($_SESSION['keyToAdd'])) {
        $cpp_file = __DIR__ . '/SelfOrganizingList/AddValueToTree.cpp';

        // Compile the C++ code
        $argument1 = $_SESSION['keyToAdd'];
        $argument2 = $_SESSION['valueToAdd'];
        $compile_command = "g++ $cpp_file $argument1 $argument2 -o output && ./output > $output_file";
    }
    elseif ($_SESSION['keyToRemove']) {
        $cpp_file = __DIR__ . '/SelfOrganizingList/RemoveValueFromTree.cpp';

        // Compile the C++ code
        $argument = $_SESSION['keyToRemove'];
        $compile_command = "g++ $cpp_file $argument -o output && ./output > $output_file";
    }
    else {
        $cpp_file = __DIR__ . '/SelfOrganizingList/ThreadedBinaryTreeDriver.cpp';

        // Compile the C++ code
        $compile_command = "g++ $cpp_file -o output && ./output > $output_file";
    }



    shell_exec($compile_command);

    // Read and display the output
    $output = file_get_contents($output_file);
    echo htmlspecialchars(trim($output));
    ?>
    </pre>


<form method="post" action="index.php?clicked=SelfBalBinTree">
    <label for="addValue">Add a Number To the Tree: </label>
    <label for="keyToAdd">Key: </label>
    <input type="text" id="keyToAdd" name="keyToAdd"> <br/><br/>
    <label for="valueToAdd">Value: </label>
    <input type="text" id="valueToAdd" name="valueToAdd"> <br/><br/>
    <input type="submit" value="Submit" name="submit" onclick="addValueToTree()"><br/><br/><br/>
</form>

<?php if (isset($_SESSION['addValue']) and $_SESSION['addValue'] != "") {
?>
<pre id="add-execution" class="add-execution"><code class="language-cpp"><?php
        // Read the contents of the C++ file and display it
        $cpp_code = file_get_contents(__DIR__ . '/SelfOrganizingList/AddValueToTree.cpp');
//        echo htmlspecialchars(trim($cpp_code));
        ?>
    </code></pre>

<h2>Output From Add Call</h2>
<pre><?php
    // Define the path to the C++ file
    $cpp_file = __DIR__ . '/SelfOrganizingList/AddValueToTree.cpp';
    $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
    $argument = $_SESSION['addValue'];

    // Compile the C++ code
    $compile_command = "g++ $cpp_file $argument -o output && ./output > $output_file";
    shell_exec($compile_command);

    // Read and display the output
    $output = file_get_contents($output_file);
    echo htmlspecialchars(trim($output));
    ?>
    </pre>
<?php
}
?>


<form method="post" action="index.php?clicked=SelfBalBinTree">
    <label for="removeValue">Remove a Number From the Tree: </label>
    <label for="keyToRemove">Key: </label>
    <input type="text" id="removeFromTree" name="removeFromTree"> <br/><br/>
    <input type="submit" value="Submit" name="submit" onclick="removeValueFromTree()"><br/><br/><br/>
</form>

<?php if (isset($_SESSION['addValue']) and $_SESSION['addValue'] != "") {
?>
<pre id="remove-execution" class="remove-execution"><code class="language-cpp"><?php
        // Read the contents of the C++ file and display it
        $cpp_code = file_get_contents(__DIR__ . '/SelfOrganizingList/RemoveValueFromTree.cpp');
//        echo htmlspecialchars(trim($cpp_code));
        ?>
    </code></pre>

<pre><?php
    // Define the path to the C++ file
    $cpp_file = __DIR__ . '/SelfOrganizingList/RemoveValueFromTree.cpp';
    $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
    $argument = $_SESSION['removeValue'];

    // Compile the C++ code
    $compile_command = "g++ $cpp_file $argument -o output && ./output > $output_file";
    shell_exec($compile_command);

    // Read and display the output
    $output = file_get_contents($output_file);
    echo htmlspecialchars(trim($output));
    ?>
    </pre>
    <?php
    }
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-cpp.min.js"></script>
<script src="/HTMLStructure/resources/Scripts/expand-box.js"></script>
<script src="/HTMLStructure/resources/Scripts/binary-tree.js"></script>

</body>
</html>

<?php

addValueToTreeForm();
removeValueFromTreeForm();


if (isset($_SESSION['addValue'])) {
//    $_SESSION['addValue'] = "";
}

//If a last name has been added into the field set the session variable to that value
if (isset($_SESSION['removeValue'])) {
//    $_SESSION['removeValue'] = "";
}
?>


<?php

