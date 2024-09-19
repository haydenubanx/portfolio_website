<?php


//The print statement for the question as presented in the assignment instructions
$question = "<blockquote>This form accepts an integer number between 10 Billion and -10 Billion (non-inclusive) and converts it to text as it would be spoken</blockquote>";


//The print statement for the question, query, and function call to print statement for the table
echo '<p class="question"><strong>' . $question . '</strong></p>';

function submitNumberToWordForm()
{
    if (isset($_POST['NumberToWord'])) {

        if (strlen($_POST['NumberToWord']) > 50) {
            echo('<p class="error">The value you entered is too long. Please re-enter a value that is under 50 characters.</p>');
        } else {
            $_SESSION['NumberToWord'] = $_POST['NumberToWord'];
        }

    }


    ?>

    <!-- linking to PyScript assets -->
    <link rel="stylesheet" href="https://pyscript.net/releases/2022.12.1/pyscript.css"/>
    <script defer src="https://pyscript.net/releases/2022.12.1/pyscript.js"></script>

    <div class="container">
        <form method="post" action="index.php?clicked=NumberToWord"  class="number-form">
            <label for="NumberToWord">Input a Number: </label>
            <input type="text" id="NumberToWord" name="NumberToWord"> <br/><br/>
            <input type="submit" value="Submit" name="submit" onclick="submitNumberToWordForm()"><br/><br/><br/>
        </form>
    </div>

    <?php
}

submitNumberToWordForm();

if (isset($_SESSION['NumberToWord']) and $_SESSION['NumberToWord'] != "") {

    ?>
    <div class="output">
        <py-script>


        import math
        import sys


        # This function returns the number of digits in a base 10 number
        def digit_counter(input_value):
            # Return 1 when zero is entered and print result
            if input_value == 0:
                return 1
            # Otherwise use the log10 of x to return the power of ten being used
            else:
                return math.floor(math.log10(abs(input_value)) + 1)


        # This function takes an input base 10 number and returns the text version of that number
        def int_to_string(number):
            # Store the original number for later use
            original_number = number
            output_string = ""
            lastNumberFlag = False
            # Take absolute value so negative numbers are processed normally
            number = abs(number)
            # Get the number of digits in the number
            num_digits = digit_counter(number)
            # The number of digits will reveal the power of ten that the number is relative too
            # allowing the correct text to be chosen
            # Numbers over 10 B are not allowed so 10 is the maximum digit number
            if num_digits > 10:
                display("Please enter a number between -10 Billion and 10 Billion")
                return output_string
            # Print for negative numbers
            if original_number < 0:
                output_string += "Negative "
            # 1 Billion
            if num_digits == 10:
                output_string += digitToText(int(number / 1000000000)) + "Billion "
                # Reduce number so the millions part is removed
                number -= int(number / 1000000000) * 1000000000
                # Decrement the number of digits so next if statement will accept it
                num_digits = digit_counter(number)
            # 100 Million
            if num_digits == 9:
                # If the digit in the hundred thousandths place is a zero, skip it ex: 1,010,987
                if int(number / 100000000) != 0:
                    lastNumberFlag = checkIfLastNumber(number, 100000000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToText(int(number / 100000000)) + "Hundred "
                    number -= int(number / 100000000) * 100000000
                # Print the Word 'And' When Necessary
                if 9 > digit_counter(number) >= 7:
                    output_string += "And "
                elif digit_counter(number) < 7:
                    output_string += "Million "
                num_digits = digit_counter(number)
            # 10 Million
            if num_digits == 8:
                # If the number is in the teens, do not print a number for the ten thousands but choose the teens instead
                if int(number / 10000000) == 1:
                    lastNumberFlag = checkIfLastNumber(number, 10000000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToTextTeens(int(((number / 1000000) % 10))) + "Million "
                    number -= int(number / 1000000) * 1000000
                    # Remove another digit to skip the thousands
                    num_digits = digit_counter(number)
                # Otherwise check that not zero
                if int(number / 10000000) != 0:
                    lastNumberFlag = checkIfLastNumber(number, 10000000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToTextTens(int(number / 10000000))
                    number -= int(number / 10000000) * 10000000
                if digit_counter(number) < 7:
                    output_string += "Million "
                num_digits = digit_counter(number)
            # 1 Million
            if num_digits == 7:
                lastNumberFlag = checkIfLastNumber(number, 1000000)
                if lastNumberFlag:
                    output_string += "And "
                output_string += digitToText(int(number / 1000000)) + "Million "
                number -= int(number / 1000000) * 1000000
                num_digits = digit_counter(number)
            # 100 Thousand
            if num_digits == 6:
                # If the digit in the hundred thousandths place is a zero, skip it ex: 1,010,987
                if int(number / 100000) != 0:
                    lastNumberFlag = checkIfLastNumber(number, 100000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToText(int(number / 100000)) + "Hundred "
                    number -= int(number / 100000) * 100000
                if 6 > digit_counter(number) >= 4:
                    output_string += "And "
                elif digit_counter(number) < 4:
                    output_string += "Thousand "
                num_digits = digit_counter(number)
            # 10 Thousand
            if num_digits == 5:
                # If the number is in the teens, do not print a number for the ten thousands but choose the teens instead
                if int(number / 10000) == 1:
                    lastNumberFlag = checkIfLastNumber(number, 10000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToTextTeens(int(((number / 1000) % 10))) + "Thousand "
                    number -= int(number / 1000) * 1000
                    # Remove another digit to skip the thousands
                    num_digits = digit_counter(number)
                    # Otherwise check that not zero
                if int(number / 10000) != 0:
                    lastNumberFlag = checkIfLastNumber(number, 10000)
                    if lastNumberFlag:
                        output_string += "And "
                    output_string += digitToTextTens(int(number / 10000))
                    number -= int(number / 10000) * 10000
                    if digit_counter(number) < 4:
                        output_string += "Thousand "
                num_digits = digit_counter(number)
            # 1 Thousands
            if num_digits == 4:
                lastNumberFlag = checkIfLastNumber(number, 1000)
                if lastNumberFlag:
                    output_string += "And "
                # print(digitToText(int(number / 1000)) + "Thousand ", end="")
                output_string += digitToText(int(number / 1000)) + "Thousand "
                number -= int(number / 1000) * 1000
                num_digits = digit_counter(number)
            # Hundreds
            if num_digits == 3:
                if int(number / 100) != 0:
                    lastNumberFlag = checkIfLastNumber(number, 100)
                    if lastNumberFlag:
                        output_string += "And "
                    # print(digitToText(int(number / 100)) + "Hundred ", end="")
                    output_string += digitToText(int(number / 100)) + "Hundred "
                    number -= int(number / 100) * 100
                    num_digits = digit_counter(number)
            # Print the Word 'And' When Necessary
            if int(number % 100) != 0 and abs(original_number) > 100:
                output_string += "And "
            # Tens
            if num_digits == 2:
                if int(number / 10) == 1:
                    lastNumberFlag = checkIfLastNumber(number, 10)
                    if lastNumberFlag:
                        output_string += "And "
                    # print(digitToTextTeens(int(number % 10)), end="")
                    output_string += digitToTextTeens(int(number % 10))
                    number -= int(number / 10) * 10
                    return output_string
                else:
                    lastNumberFlag = checkIfLastNumber(number, 10)
                    if lastNumberFlag:
                        output_string += "And "
                    # print(digitToTextTens(int(number / 10)), end="")
                    output_string += digitToTextTens(int(number / 10))
                    number -= int(number / 10) * 10
                    num_digits = digit_counter(number)
            # Ones
            if num_digits == 1:
                if int(number % 10) != 0:
                    output_string += digitToText(int(number % 10))
                elif original_number == 0:
                    output_string += "Zero"
                return output_string

        # This function converts a number between 0 - 9 to text
        def digitToText(value):
            match (value):
                case (0):
                    return ""
                case (1):
                    return "One "
                case (2):
                    return "Two "
                case (3):
                    return "Three "
                case (4):
                    return "Four "
                case (5):
                    return "Five "
                case (6):
                    return "Six "
                case (7):
                    return "Seven "
                case (8):
                    return "Eight "
                case (9):
                    return "Nine "


        # This function converts multiples of ten to text i.e. 10, 20, 30...
        def digitToTextTens(value):
            match (value):
                case (0):
                    return ""
                case (1):
                    return ""
                case (2):
                    return "Twenty "
                case (3):
                    return "Thirty "
                case (4):
                    return "Forty "
                case (5):
                    return "Fifty "
                case (6):
                    return "Sixty "
                case (7):
                    return "Seventy "
                case (8):
                    return "Eighty "
                case (9):
                    return "Ninety "


        # This function converts numbers in the teens to text i.e. 11, 12, 13...
        def digitToTextTeens(value):
            match (value):
                case (0):
                    return "Ten "
                case (1):
                    return "Eleven "
                case (2):
                    return "Twelve "
                case (3):
                    return "Thirteen "
                case (4):
                    return "Fourteen "
                case (5):
                    return "Fifteen "
                case (6):
                    return "Sixteen "
                case (7):
                    return "Seventeen "
                case (8):
                    return "Eighteen "
                case (9):
                    return "Nineteen "


        def checkIfLastNumber(value, degree):
            tempNumber = value - int(value / degree) * degree

            if tempNumber == 0:
                return True
            else:
                return False


        # Main Program
        input_number = <?php echo $_SESSION['NumberToWord']?>

        display("Input Number: " + str(input_number))
        output_number = int_to_string(input_number)
        display("Output String: " + str(output_number))

        </py-script>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .question {
            font-size: 1.5em;  /* Increased size for better visibility */
            margin-bottom: 20px;
            color: #555;
            border-bottom: 2px solid #ffa500;  /* Added a bottom border */
            padding-bottom: 10px;  /* Spacing below the heading */
            text-align: center;  /* Center the question text */
        }

        .number-form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            width: 100%;  /* Ensure the input box fills the container */
            box-sizing: border-box;  /* Include padding and border in the element's total width */
        }

        input[type="submit"] {
            background-color: #ffa500;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;  /* Make the submit button fill the container */
        }

        input[type="submit"]:hover {
            background-color: #e59400;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .output {
            margin-top: 20px;
            font-size: 1.2em;  /* Increased size for better readability */
            color: #333;
            background-color: #f0f8ff;  /* Light background for better contrast */
            border: 1px solid #ccc;  /* Border around output */
            border-radius: 4px;  /* Rounded corners */
            padding: 15px;  /* Spacing inside the output box */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);  /* Subtle shadow */
        }
    </style>
<?php }
