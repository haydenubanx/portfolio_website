<?php

const BOARD_SIZE = 25;

function updateShipDetails($shipMap, $positionChecked, $shipTracker1, $shipTracker2, $shipTracker3, $shipTracker4, $shipTracker5, $shipTracker6, $shipTracker7, $ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7)
{

    //Loops through the grid and for each position assigns corresponding ship, ship length, and position
    for ($i = 1; $i <= BOARD_SIZE; $i++) {
        for ($j = 1; $j <= BOARD_SIZE; $j++) {

            //Updates ship struct to gather info of ship
            if ($shipMap[$i][$j] == '#' && !$positionChecked[$i][$j]) {

                //If no info for ship 1, start gathering data for ship 1
                if ($ship1->length == 0) {
                    $ship1->length++;
                    $shipTracker1[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one to continue assigning to the same ship
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship1->length++;
                            $shipTracker1[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to the right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship1->length++;
                            $shipTracker1[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 2, start gathering data for ship 2
                else if ($ship2->length == 0) {
                    $ship2->length++;
                    $shipTracker2[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship2->length++;
                            $shipTracker2[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship2->length++;
                            $shipTracker2[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 3, start gathering data for ship 3
                else if ($ship3->length == 0) {
                    $ship3->length++;
                    $shipTracker3[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship3->length++;
                            $shipTracker3[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to the right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship3->length++;
                            $shipTracker3[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 4, start gathering data for ship 4
                else if ($ship4->length == 0) {
                    $ship4->length++;
                    $shipTracker4[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship4->length++;
                            $shipTracker4[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship4->length++;
                            $shipTracker4[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 5, start gathering data for ship 5
                else if ($ship5->length == 0) {
                    $ship5->length++;
                    $shipTracker5[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship5->length++;
                            $shipTracker5[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship5->length++;
                            $shipTracker5[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 6, start gathering data for ship 6
                else if ($ship6->length == 0) {
                    $ship6->length++;
                    $shipTracker6[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship6->length++;
                            $shipTracker6[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }

                        //Check spaces to right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship6->length++;
                            $shipTracker6[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                } //If no info for ship 7, start gathering data for ship 7
                else if ($ship7->length == 0) {
                    $ship7->length++;
                    $shipTracker7[$i][$j] = true;
                    $positionChecked[$i][$j] = true;

                    //Check spaces around this one
                    for ($p = 1; $p <= 5; $p++) {
                        //Check spaces directly below this location up to 5 spaces below
                        if ($i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]) {
                            $ship7->length++;
                            $shipTracker7[$i + $p][$j] = true;
                            $positionChecked[$i + $p][$j] = true;
                        }
                        //Check spaces to right of this position up to 5 spaces away
                        if ($j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]) {
                            $ship7->length++;
                            $shipTracker7[$i][$j + $p] = true;
                            $positionChecked[$i][$j + $p] = true;
                        }
                    }
                }
            }
        }
    }

    $_SESSION['ship1'] = $ship1;
    $_SESSION['ship2'] = $ship2;
    $_SESSION['ship3'] = $ship3;
    $_SESSION['ship4'] = $ship4;
    $_SESSION['ship5'] = $ship5;
    $_SESSION['ship6'] = $ship6;
    $_SESSION['ship7'] = $ship7;

    $_SESSION['shipTracker1'] = $shipTracker1;
    $_SESSION['shipTracker2'] = $shipTracker2;
    $_SESSION['shipTracker3'] = $shipTracker3;
    $_SESSION['shipTracker4'] = $shipTracker4;
    $_SESSION['shipTracker5'] = $shipTracker5;
    $_SESSION['shipTracker6'] = $shipTracker6;
    $_SESSION['shipTracker7'] = $shipTracker7;

}

// Load the battleship board from a text file
function loadBoardFromFile()
{
    $board = array();
    $boardSeed = ((floor(microtime(true) * 1000)) % 10) + 1;
    $file = fopen(__DIR__ . '/BattleshipSeeds/BattleMap' . $boardSeed . '.txt', 'r');
    if (!$file) {
        throw new Exception("Board file not found or could not be opened.");
    } else if ($file) {
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

function stringContains($haystack, $needle)
{
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}

// Initialize the battleship game board from a file if not set in session
function initializeSessionBoard()
{
    if (!isset($_SESSION['board']) || !isset($_SESSION['displayBoard'])) {
        $_SESSION['board'] = loadBoardFromFile();
        $_SESSION['displayBoard'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
        $_SESSION['shipsLeft'] = 7;
    }
}

// Function to process the shot based on the coordinates
function processShot($shipTra1, $shipTra2, $shipTra3, $shipTra4, $shipTra5, $shipTra6, $shipTra7, $ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7)
{
    global $fireResult;
    $ships = [$ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7];
    $shipTrackers = [$shipTra1, $shipTra2, $shipTra3, $shipTra4, $shipTra5, $shipTra6, $shipTra7];
    $status = '';


    if (isset($_POST['xCoordinate']) && isset($_POST['yCoordinate'])) {
        $x = intval($_POST['xCoordinate']);
        $y = intval($_POST['yCoordinate']);

        // Validate the coordinates
        if ($x < 1 || $x > BOARD_SIZE || $y < 1 || $y > BOARD_SIZE) {
            $fireResult = '<p class="error">Coordinates out of bounds. Please try again.</p>';
        } else {
            // Check if the shot hits a ship or misses
            $actualValue = $_SESSION['board'][$x][$y];
            if ($actualValue == '#') {

                foreach ($ships as $index => $ship) {

                    //Checks if ship has been hit before and if so prints hit again message
                    if ($ship->hitBefore && $shipTrackers[$index][$x][$y]) {
                        //Updates both the final map and the current guesses map
                        $status = "hit again ";

                        //Updates the number of times this ship has been hit
                        $ship->setHitCount($ship->getHitCount() + 1);

                        //If the ship has been hit as many times as it is long, the ship is sunk and the sunk message is printed
                        if ($ship->hitCount == $ship->length) {
                            $status .= "and sunk!";
                            $ship->setSunk(true);
                            $_SESSION['shipsLeft']--;
                        }

                    } //Print hit message if this is the first time this ship has been hit
                    else {
                        //Updates both the endgame grid and the current guesses grid
                        if($shipTrackers[$index][$x][$y]) {
                            $status = 'hit';
                            $ship->setHitBefore(true);
                            $ship->setHitCount($ship->getHitCount() + 1);
                        }
                    }
                }
            } else {
                $status = 'miss';
            }

            // Update the display board with the result
            $_SESSION['displayBoard'][$x][$y] = $status;

            $_SESSION['ship1'] = $ship1;
            $_SESSION['ship2'] = $ship2;
            $_SESSION['ship3'] = $ship3;
            $_SESSION['ship4'] = $ship4;
            $_SESSION['ship5'] = $ship5;
            $_SESSION['ship6'] = $ship6;
            $_SESSION['ship7'] = $ship7;

            $_SESSION['shipTracker1'] = $shipTra1;
            $_SESSION['shipTracker2'] = $shipTra2;
            $_SESSION['shipTracker3'] = $shipTra3;
            $_SESSION['shipTracker4'] = $shipTra4;
            $_SESSION['shipTracker5'] = $shipTra5;
            $_SESSION['shipTracker6'] = $shipTra6;
            $_SESSION['shipTracker7'] = $shipTra7;

            // Prepare the result message
            $fireResult = "<p class='fire-result'>Fired at coordinates ($x, $y): " . ucfirst($status) . "</p>";
        }
    }
}

// Reset the game board
if (isset($_POST['reset'])) {
    $_SESSION['board'] = loadBoardFromFile();
    $_SESSION['shipsLeft'] = 7;
    $_SESSION['displayBoard'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['areAllSunk'] = false;

    unset($_SESSION['ship1']);
}

// Handle form submission

$fireResult = '';

if (!isset($_SESSION['areAllSunk'])) {
    $_SESSION['areAllSunk'] = false;
}

if (!isset($_SESSION['ship1'])) {
    $_SESSION['ship1'] = new Ship(0);
    $_SESSION['ship2'] = new Ship(0);
    $_SESSION['ship3'] = new Ship(0);
    $_SESSION['ship4'] = new Ship(0);
    $_SESSION['ship5'] = new Ship(0);
    $_SESSION['ship6'] = new Ship(0);
    $_SESSION['ship7'] = new Ship(0);

    $_SESSION['shipTracker1'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker2'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker3'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker4'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker5'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker6'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['shipTracker7'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
}

// Load ships and trackers from session
$ship1 = $_SESSION['ship1'];
$ship2 = $_SESSION['ship2'];
$ship3 = $_SESSION['ship3'];
$ship4 = $_SESSION['ship4'];
$ship5 = $_SESSION['ship5'];
$ship6 = $_SESSION['ship6'];
$ship7 = $_SESSION['ship7'];

$shipTracker1 = $_SESSION['shipTracker1'];
$shipTracker2 = $_SESSION['shipTracker2'];
$shipTracker3 = $_SESSION['shipTracker3'];
$shipTracker4 = $_SESSION['shipTracker4'];
$shipTracker5 = $_SESSION['shipTracker5'];
$shipTracker6 = $_SESSION['shipTracker6'];
$shipTracker7 = $_SESSION['shipTracker7'];


if (!isset($_SESSION['positionChecked'])) {

    $_SESSION['positionChecked'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
}

initializeSessionBoard();
updateShipDetails($_SESSION['board'], $_SESSION['positionChecked'], $_SESSION['shipTracker1'], $_SESSION['shipTracker2'], $_SESSION['shipTracker3'], $_SESSION['shipTracker4'], $_SESSION['shipTracker5'], $_SESSION['shipTracker6'], $_SESSION['shipTracker7'], $ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7);



if(isset($_SESSION['ship1'])) {
    $ship1 = $_SESSION['ship1'];
    $ship2 = $_SESSION['ship2'];
    $ship3 = $_SESSION['ship3'];
    $ship4 = $_SESSION['ship4'];
    $ship5 = $_SESSION['ship5'];
    $ship6 = $_SESSION['ship6'];
    $ship7 = $_SESSION['ship7'];
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['reset'])) {
    processShot($_SESSION['shipTracker1'], $_SESSION['shipTracker2'], $_SESSION['shipTracker3'], $_SESSION['shipTracker4'], $_SESSION['shipTracker5'], $_SESSION['shipTracker6'], $_SESSION['shipTracker7'], $ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7);
//    echo($_SESSION['ship1'] . $_SESSION['ship2'] . $_SESSION['ship3'] . $_SESSION['ship4'] . $_SESSION['ship5'] . $_SESSION['ship6'] . $_SESSION['ship7']);

    $ship1 = $_SESSION['ship1'];
    $ship2 = $_SESSION['ship2'];
    $ship3 = $_SESSION['ship3'];
    $ship4 = $_SESSION['ship4'];
    $ship5 = $_SESSION['ship5'];
    $ship6 = $_SESSION['ship6'];
    $ship7 = $_SESSION['ship7'];
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
            color: darkorange;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(100, 100, 100, 0.6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .battleForm {
            background-color: rgba(300, 300, 300, 0);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: darkorange;
            font-weight: bold;
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
            width: 20px; /* Reduced from 30px */
            height: 20px; /* Reduced from 30px */
            background-color: #aaa;
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
            color: darkorange;
        }

        .reset-button {
            background-color: #ff0000;
            width: 100%;
            color: white;
            border: none;
            font-weight: bold;
            padding: 1em;
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 10px;
        }

        .reset-button:hover {
            background-color: #cc0000;
        }

        body {
            background: url('../../resources/images/wallpaper.jpg') no-repeat center;
            background-size: cover;
            animation: zoom 20s infinite alternate;
            z-index: -1;
        }

        .hiddenForm {
            display: none;
        }

        .title {
            font-weight: bold;
            color: darkorange;
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
    <h1 class="title">Fire Your Shot!</h1>

    <!-- Display ships left -->
    <div class="ships-left">
        Ships Left: <?php echo $_SESSION['shipsLeft']; ?>
    </div>

    <div id="board" class="board">
        <!-- PHP to generate the BOARD_SIZExBOARD_SIZE board -->
        <?php
        for ($i = 1; $i <= BOARD_SIZE; $i++) {
            for ($j = 1; $j <= BOARD_SIZE; $j++) {
                $cellStatus = $_SESSION['displayBoard'][$i][$j];
                $cellClass = '';
                if (stringContains($cellStatus, strtolower('hit'))) {
                    $cellClass = 'hit selected';
                } elseif (stringContains($cellStatus, strtolower('miss'))) {
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
    <form name="battleForm" method="POST" class="hiddenForm">
        <input type="hidden" name="xCoordinate" id="xCoordinate">
        <input type="hidden" name="yCoordinate" id="yCoordinate">
    </form>

    <form method="POST" class="battleForm">
        <button class="reset-button" name="reset">New Board</button>
    </form>

</div>

</body>
</html>