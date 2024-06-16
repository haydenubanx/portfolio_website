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
            $_SESSION['keyToAdd'] = $_POST['keyToAdd'];
            $_SESSION['valueToAdd'] = $_POST['valueToAdd'];

            $cpp_file = __DIR__ . '/SelfOrganizingList/AddValueToTree.cpp';
            $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
            $compile_command = "g++ $cpp_file -o addValueToTree";
            shell_exec($compile_command);

            // Add debug output for compile command
            echo '<pre>Compile Command: ' . htmlspecialchars($compile_command) . '</pre>';

            $execute_command = "./addValueToTree {$_SESSION['keyToAdd']} {$_SESSION['valueToAdd']} > $output_file";
            shell_exec($execute_command);

            // Add debug output for execute command
            echo '<pre>Execute Command: ' . htmlspecialchars($execute_command) . '</pre>';

            // Read and display the output
            if (file_exists($output_file)) {
                $output = file_get_contents($output_file);
                $_SESSION['output'] = $output;
                $_SESSION['lastAction'] = 'add';
            } else {
                echo '<p>Output file not found: ' . htmlspecialchars($output_file) . '</p>';
            }
        }

}

function removeValueFromTreeForm()
{
    if (isset($_POST['keyToRemove'])) {

            $_SESSION['keyToRemove'] = $_POST['keyToRemove'];

            $cpp_file = __DIR__ . '/SelfOrganizingList/RemoveValueFromTree.cpp';
            $output_file = __DIR__ . '/SelfOrganizingList/OutputData.txt';
            $compile_command = "g++ $cpp_file -o removeValueFromTree";
            shell_exec($compile_command);

            // Add debug output for compile command
            echo '<pre>Compile Command: ' . htmlspecialchars($compile_command) . '</pre>';

            $execute_command = "./removeValueFromTree {$_SESSION['keyToRemove']} > $output_file ";
            shell_exec($execute_command);

            // Add debug output for execute command
            echo '<pre>Execute Command: ' . htmlspecialchars($execute_command) . '</pre>';

            // Read and display the output
            if (file_exists($output_file)) {
                $output = file_get_contents($output_file);
                $_SESSION['output'] = $output;
                $_SESSION['lastAction'] = 'remove';
            } else {
                echo '<p>Output file not found: ' . htmlspecialchars($output_file) . '</p>';
            }
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
            ?></code></pre>
</div>

<form method="post" action="">
    <label for="keyToAdd">Add a Number To the Tree: </label>
    <label for="keyToAdd">Key: </label>
    <input type="text" id="keyToAdd" name="keyToAdd"> <br/><br/>
    <label for="valueToAdd">Value: </label>
    <input type="text" id="valueToAdd" name="valueToAdd"> <br/><br/>
    <input type="submit" value="Submit" name="submitAdd"><br/><br/><br/>
</form>

<form method="post" action="">
    <label for="keyToRemove">Remove a Number From the Tree: </label>
    <label for="keyToRemove">Key: </label>
    <input type="text" id="keyToRemove" name="keyToRemove"> <br/><br/>
    <input type="submit" value="Submit" name="submitRemove"><br/><br/><br/>
</form>

<h2>Output</h2>
<pre>
<?php
if (isset($_SESSION['output']) && isset($_SESSION['lastAction'])) {
    if ($_SESSION['lastAction'] == 'add') {
        echo 'Output from Add Call:';
    } elseif ($_SESSION['lastAction'] == 'remove') {
        echo 'Output from Remove Call:';
    }
    echo '<br>' . htmlspecialchars(trim($_SESSION['output']));
}
?>
</pre>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-cpp.min.js"></script>
<script src="/HTMLStructure/resources/Scripts/expand-box.js"></script>
<script src="/HTMLStructure/resources/Scripts/binary-tree.js"></script>

</body>
</html>
