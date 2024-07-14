<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Balancing BST</title>
</head>
<body>

<?php

// The print statement for the question as presented in the assignment instructions
$question = "<blockquote>This form accepts a number and adds it to a binary search tree while updating the tree so that it remains balanced</blockquote>";

// The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';

function addValueToTreeForm()
{
    if (isset($_POST['keyToAdd']) && isset($_POST['valueToAdd'])) {
//        $_SESSION['keyToAdd'] = $_POST['keyToAdd'];
//        $_SESSION['valueToAdd'] = $_POST['valueToAdd'];

        $cpp_file = __DIR__ . '/SelfOrganizingList/AddValueToTree.cpp';
        $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
        $compile_command = "g++ $cpp_file -o addValueToTree";
        shell_exec($compile_command);

        $execute_command = "./addValueToTree {$_POST['keyToAdd']} {$_POST['valueToAdd']}";
        shell_exec($execute_command);

        // Read and display the output
        if (file_exists($output_file)) {
            $output = file_get_contents($output_file);
            $_SESSION['output'] = $output;
            $_SESSION['lastAction'] = 'add';
        } else {
            echo '<p>Output file not found: ' . htmlspecialchars($output_file) . '</p>';
        }

        unset($_POST['keyToAdd']);
        unset($_POST['valueToAdd']);
    }

}

function removeValueFromTreeForm()
{
    if (isset($_POST['keyToRemove'])) {

//        $_SESSION['keyToRemove'] = $_POST['keyToRemove'];

        $cpp_file = __DIR__ . '/SelfOrganizingList/RemoveValueFromTree.cpp';
        $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
        $compile_command = "g++ $cpp_file -o removeValueFromTree";
        shell_exec($compile_command);

        $execute_command = "./removeValueFromTree {$_POST['keyToRemove']}";
        shell_exec($execute_command);


        // Read and display the output
        if (file_exists($output_file)) {
            $output = file_get_contents($output_file);
            $_SESSION['output'] = $output;
            $_SESSION['lastAction'] = 'remove';
        } else {
            echo '<p>Output file not found: ' . htmlspecialchars($output_file) . '</p>';
        }
        unset($_POST['keyToRemove']);
    }

}

// Check if forms are submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitAdd'])) {
        addValueToTreeForm();
    } elseif (isset($_POST['submitRemove'])) {
        removeValueFromTreeForm();
    }
}

?>

<h1>Binary Tree Visualization</h1>
<div id="tree-container" class="tree"></div>

<?php
$file_path = __DIR__ . '/SelfOrganizingList/OutputData.txt'; // Path to the file containing the C++ output

$treeData = array();
$parentNodes = array(); // Store parent nodes by key for easy lookup

if (file_exists($file_path)) {
    $file = fopen($file_path, "r");
    $currentNode = null;

    while (($line = fgets($file)) !== false) {
        $line = trim($line);

        if (strpos($line, "Child") === false) {
            // Node definition
            $parts = explode(',', $line);
            if (count($parts) == 2) {
                $key = $parts[0];
                $value = $parts[1];
                $currentNode = array('key' => $key, 'value' => $value, 'children' => array());

                $parentNodes[$key] = &$currentNode;
                $treeData[] = &$currentNode;
            }
        } else {
            // Instruction
            $parts = explode(',', $line);
            if (count($parts) == 2) {
                $relation = trim($parts[0]);
                $childKey = trim($parts[1]);

                if ($relation == "Left Child") {
                    $currentNode['children']['left'] = $childKey;
                } elseif ($relation == "Right Child") {
                    $currentNode['children']['right'] = $childKey;
                }

                // Ensure the child node exists in parentNodes
                if (!isset($parentNodes[$childKey])) {
                    $parentNodes[$childKey] = array('key' => $childKey, 'value' => '', 'children' => array());
                }
            }
        }
    }

    fclose($file);
} else {
    echo '<p>Unable to read tree data from file.</p>';
}

echo '<script>';
echo 'var treeData = ' . json_encode($treeData) . ';';
echo '</script>';
?>

<h1>Output</h1>
<div class="code-container">
    <button class="toggle-button" onclick="toggleCode()">Show Output</button>
<pre id="code-box" class="code-box">
<?php
// Define the path to the C++ file
$cpp_file = __DIR__ . '/SelfOrganizingList/ThreadedBinaryTreeDriver.cpp';
$output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';

// Compile the C++ code
$compile_command = "g++ $cpp_file -o output && ./output";
shell_exec($compile_command);

// Read and display the output
$output = file_get_contents($output_file);
echo htmlspecialchars(trim($output));
?>
</pre>
</div>

<form method="post" action="index.php?clicked=SelfBalBinTree">
    <label for="keyToAdd">Add a Number To the Tree: </label>
    <label for="keyToAdd">Key: </label>
    <input type="text" id="keyToAdd" name="keyToAdd"> <br/><br/>
    <label for="valueToAdd">Value: </label>
    <input type="text" id="valueToAdd" name="valueToAdd"> <br/><br/>
    <input type="submit" value="Submit" name="submitAdd"><br/><br/><br/>
</form>

<form method="post" action="index.php?clicked=SelfBalBinTree">
    <label for="keyToRemove">Remove a Number From the Tree: </label>
    <label for="keyToRemove">Key: </label>
    <input type="text" id="keyToRemove" name="keyToRemove"> <br/><br/>
    <input type="submit" value="Submit" name="submitRemove"><br/><br/><br/>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-cpp.min.js"></script>
<script src="resources/Scripts/expand-box.js"></script>
<script src="resources/Scripts/binary-tree.js"></script>

</body>
</html>

