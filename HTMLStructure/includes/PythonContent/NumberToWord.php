<?php

require_once 'HTMLStructure/includes/PythonContent/NumberToWord.py';

//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>This form accepts an integer number and converts it to text as it would be spoken</blockquote>";


//The print statement for the question, query, and function call to print statement for the table
echo '<p><strong>' . $question . '</strong></p>';

$command = escapeshellcmd('HTMLStructure/includes/PythonContent/NumberToWord.py');
$output = shell_exec($command);
echo $output;

?>


