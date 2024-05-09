import math


# This function returns the number of digits in a base 10 number
def digit_counter(input_value):

    # Return 1 when zero is entered and print result
    if input_value == 0:
        print("Zero", end="")
        return 1

    # Otherwise use the log10 of x to return the power of ten being used
    # The floor function removes the decimal from this value then adds one as a partial digit can never exist
    # and a decimal part indicates it should be one higher. Absolute value is taken to allow negative num.
    else:
        return math.floor(math.log10(abs(input_value)) + 1)


# This function takes an input base 10 number and returns the text version of that number
def int_to_string(number):

    # Store the original number for later use
    original_number = number

    # Take absolute value so negative numbers are processed normally
    number = abs(number)

    # Get the number of digits in the number
    num_digits = round(digit_counter(number))

    # The number of digits will reveal the power of ten that the number is relative too
    # allowing the correct text to be chosen
    # Numbers over 10 M are not allowed so 7 is the maximum digit number
    if num_digits > 7:
        print("Please enter a number between -10 Million and 10 Million")
        return 0

    # Print for negative numbers
    if original_number < 0:
        print("Negative ", end="")

    # 1 Million
    if num_digits == 7:
        # Print text of digit in the millions place followed by million
        print(digitToText(int(number / 1000000)) + "Million ", end="")
        # Reduce number so the millions part is removed
        number -= int(number / 1000000) * 1000000
        # Decrement the number of digits so next if statement will accept it
        num_digits -= 1

    # 100 Thousand
    if num_digits == 6:
        # If the digit in the hundred thousandths place is a zero, skip it ex: 1,010,987
        if int(number / 100000) != 0:
            print(digitToText(int(number / 100000)) + "Hundred ", end="")
            number -= int(number / 100000) * 100000
        num_digits -= 1

    # 10 Thousand
    if num_digits == 5:
        # If the number is in the teens, do not print a number for the ten thousands but choose the teens instead
        if int(number / 10000) == 1:
            print(digitToTextTeens(int(((number / 1000) % 10))) + "Thousand ", end="")
            number -= int(number / 1000) * 1000
            # Remove another digit to skip the thousands
            num_digits -= 1

        # Otherwise check that not zero
        if int(number / 10000) != 0:
            print(digitToTextTens(int(number / 10000)), end="")
            number -= int(number / 10000) * 10000
        num_digits -= 1

    # 1 Thousands
    if num_digits == 4:

        print(digitToText(int(number / 1000)) + "Thousand ", end="")
        number -= int(number / 1000) * 1000
        num_digits -= 1

    # Hundreds
    if num_digits == 3:
        if int(number / 100) != 0:
            print(digitToText(int(number / 100)) + "Hundred ", end="")
            number -= int(number / 100) * 100
        num_digits -= 1

    # Print the Word 'And' When Necessary
    if int(number % 100) != 0 and abs(original_number) > 100:
        print("And ", end="")

    # Tens
    if num_digits == 2:
        if int(number / 10) == 1:
            print(digitToTextTeens(int(number % 10)), end="")
            number -= int(number / 10) * 10
            return 0

        else:
            print(digitToTextTens(int(number / 10)), end="")
            number -= int(number / 10) * 10
        num_digits -= 1

    # Ones
    if num_digits == 1:
        if int(number % 10) != 0:
            print(digitToText(int(number % 10)), end="")


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


# Main Program
input_number = 0

# Retrieve starting number from user
print()
input_number = int(input("Please enter a number between -10 Million and 10 Million or -1 to quit: "))
print()

# Continue to run the program until -1 is input
while input_number != -1:

    int_to_string(input_number)
    print()
    print()
    input_number = int(input("Please enter a number or -1 to quit: "))
    print()