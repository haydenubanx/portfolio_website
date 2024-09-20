<?php

// Load the battleship board from a text file
function loadBoardFromFile() {
    $board = array();
    $boardSeed = ((floor(microtime(true) * 1000)) % 10) + 1;
    $file = fopen(__DIR__.'/BattleshipSeeds/BattleMap'.$boardSeed.'.txt', 'r');
    if ($file) {
        $y = 1;
        while (($line = fgets($file)) !== false) {
            for ($x = 1; $x <= strlen(trim($line)); $x++) {
                $board[$x][$y] = $line[$x - 1]; // Store either '#' or '~'
            }
            $y++;
        }
        fclose($file);
    }
    return $board;
}

// Initialize the battleship game board from file if not set in session
if (!isset($_SESSION['board']) || !isset($_SESSION['displayBoard'])) {
    $_SESSION['board'] = loadBoardFromFile();  // Actual board with ships (#) and water (~)
    $_SESSION['displayBoard'] = array_fill(1, 25, array_fill(1, 25, '')); // Display board with empty values
    $_SESSION['shipsLeft'] = 7;
}

// Function to process the shot based on the coordinates
function processShot() {
    global $fireResult;

    if (isset($_POST['xCoordinate']) && isset($_POST['yCoordinate'])) {
        $x = intval($_POST['xCoordinate']);
        $y = intval($_POST['yCoordinate']);

        // Validate the coordinates
        if ($x < 1 || $x > 25 || $y < 1 || $y > 25) {
            $fireResult = '<p class="error">Coordinates out of bounds. Please try again.</p>';
        } else {
            // Check if the shot hits a ship or misses
            $actualValue = $_SESSION['board'][$x][$y];
            if ($actualValue == '#') {
                $status = 'hit';
            } else {
                $status = 'miss';
            }

            // Update the display board with the result
            $_SESSION['displayBoard'][$x][$y] = $status;

            // Prepare the result message
            $fireResult = "<p class='fire-result'>Fired at coordinates ($x, $y): " . ucfirst($status) . "!</p>";
        }
    }
}

// Reset the game board
if (isset($_POST['reset'])) {
    $_SESSION['board'] = loadBoardFromFile();
    $_SESSION['shipsLeft'] = 7;
    $_SESSION['displayBoard'] = array_fill(1, 25, array_fill(1, 25, ''));
}

// Handle form submission
$fireResult = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['reset'])) {
    processShot();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battleship Game - Shoot Your Shot</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .board {
            display: grid;
            grid-template-columns: repeat(25, 20px); /* Reduced from 30px */
            grid-template-rows: repeat(25, 20px); /* Reduced from 30px */
            gap: 2px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .cell {
            width: 20px;  /* Reduced from 30px */
            height: 20px; /* Reduced from 30px */
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .cell:hover {
            background-color: #eee;
        }

        .cell.hit {
            background-color: #ff0000; /* Red for hit */
        }

        .cell.miss {
            background-color: #eee; /* White for miss */
        }

        .cell.selected {
            pointer-events: none; /* Disable re-selection */
        }

        .ships-left {
            position: relative;
            left: 7em;
            font-size: 18px;
            font-weight: bold;
            color: darkorange;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .fire-result {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            color: #333;
        }

        .reset-button {
            background-color: #ff0000;
            width: 100%;
            color: white;
            border: none;
            padding: 1em;
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .reset-button:hover {
            background-color: #cc0000;
        }

        .battleForm {
            display: none;
        }
    </style>

    <script>
        // JavaScript to handle cell click and auto-submit the form
        function handleCellClick(x, y) {
            document.getElementById('xCoordinate').value = x;
            document.getElementById('yCoordinate').value = y;
            document.battleForm.submit(); // Submit the form automatically
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Fire Your Shot!</h1>

    <!-- Display ships left -->
    <div class="ships-left">
<!--        Ships Left: --><?php //echo $_SESSION['shipsLeft']; ?>
    </div>

    <div id="board" class="board">
        <!-- PHP to generate the 25x25 board -->
        <?php
        for ($i = 1; $i <= 25; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                $cellStatus = $_SESSION['displayBoard'][$i][$j];
                $cellClass = '';
                if ($cellStatus == 'hit') {
                    $cellClass = 'hit selected';
                } elseif ($cellStatus == 'miss') {
                    $cellClass = 'miss selected';
                }
                echo "<div class='cell $cellClass' data-x='$i' data-y='$j' onclick='handleCellClick($i, $j)'></div>";
            }
        }
        ?>
    </div>

    <!-- Fire result displayed below the board -->
    <?php echo $fireResult; ?>

    <!-- Form to submit coordinates (now auto-filled and auto-submitted) -->
    <form name="battleForm" method="POST" class="battleForm">
        <input type="hidden" name="xCoordinate" id="xCoordinate">
        <input type="hidden" name="yCoordinate" id="yCoordinate">
    </form>

    <form method="POST" >
        <button class="reset-button" name="reset">New Board</button>
    </form>

</div>

</body>
</html>