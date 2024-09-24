<?php
include_once __DIR__ . '/../DbConnection/db.php';
include __DIR__ . '/../SqlContent/TableFormatting.php';


const BOARD_SIZE = 25;
$leaderboardQuery = "Select ROW_NUMBER() OVER(ORDER BY shots) AS Ranking, name AS Name, shots As 'Shots Taken' from leaderboard order by shots limit 10;";
$leaderBoardResults = mysqli_query($_SESSION['dbConnection'], $leaderboardQuery);


function updateShipDetails($shipMap, $positionChecked, &$shipTracker1, &$shipTracker2, &$shipTracker3, &$shipTracker4, &$shipTracker5, &$shipTracker6, &$shipTracker7, &$ship1, &$ship2, &$ship3, &$ship4, &$ship5, &$ship6, &$ship7)
{
    $ships = [&$ship1, &$ship2, &$ship3, &$ship4, &$ship5, &$ship6, &$ship7];
    $shipTrackers = [&$shipTracker1, &$shipTracker2, &$shipTracker3, &$shipTracker4, &$shipTracker5, &$shipTracker6, &$shipTracker7];

    for ($i = 1; $i <= BOARD_SIZE; $i++) {
        for ($j = 1; $j <= BOARD_SIZE; $j++) {

            // If the current position is part of a ship and has not been checked
            if ($shipMap[$i][$j] == '#' && !$positionChecked[$i][$j]) {

                // Find the first available ship
                foreach ($ships as $index => $ship) {
                    if ($ship->length == 0) {
                        // Mark the position as checked and assign it to the current ship
                        $ship->length++;
                        $shipTrackers[$index][$i][$j] = true;
                        $positionChecked[$i][$j] = true;

                        // Determine if the ship is horizontal or vertical
                        $isVertical = ($i + 1 <= BOARD_SIZE && $shipMap[$i + 1][$j] == '#');
                        $isHorizontal = ($j + 1 <= BOARD_SIZE && $shipMap[$i][$j + 1] == '#');

                        // Expand the ship based on its orientation
                        if ($isVertical) {
                            // The ship is vertical, so check downward
                            for ($p = 1; $p <= 5 && $i + $p <= BOARD_SIZE && $shipMap[$i + $p][$j] == '#' && !$positionChecked[$i + $p][$j]; $p++) {
                                $ship->length++;
                                $shipTrackers[$index][$i + $p][$j] = true;
                                $positionChecked[$i + $p][$j] = true;
                            }
                        } elseif ($isHorizontal) {
                            // The ship is horizontal, so check to the right
                            for ($p = 1; $p <= 5 && $j + $p <= BOARD_SIZE && $shipMap[$i][$j + $p] == '#' && !$positionChecked[$i][$j + $p]; $p++) {
                                $ship->length++;
                                $shipTrackers[$index][$i][$j + $p] = true;
                                $positionChecked[$i][$j + $p] = true;
                            }
                        }

                        // Break out of the loop after assigning this ship
                        break;
                    }
                }
            }
        }
    }

    // Store ships and trackers back to session
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
        $powerUp = isset($_POST['powerUpType']) ? $_POST['powerUpType'] : '';

        // Validate the coordinates
        if ($x < 1 || $x > BOARD_SIZE || $y < 1 || $y > BOARD_SIZE) {
            $fireResult = '<p class="error">Coordinates out of bounds. Please try again.</p>';
            return;
        }

        // Determine the affected cells based on powerup type
        $affectedCells = [];
        if ($powerUp == 'cannon') {
            for ($i = $x - 1; $i <= $x + 1; $i++) {
                for ($j = $y - 1; $j <= $y + 1; $j++) {
                    if ($i >= 1 && $i <= BOARD_SIZE && $j >= 1 && $j <= BOARD_SIZE) {
                        $affectedCells[] = [$i, $j];
                    }
                }
            }
        } elseif ($powerUp == 'airRaid') {
            for ($i = -2; $i <= 2; $i++) {
                if ($x + $i >= 1 && $x + $i <= BOARD_SIZE && $y + $i >= 1 && $y + $i <= BOARD_SIZE) {
                    $affectedCells[] = [$x + $i, $y + $i]; // Diagonal 1
                }
                if ($x + $i >= 1 && $x + $i <= BOARD_SIZE && $y - $i >= 1 && $y - $i <= BOARD_SIZE) {
                    $affectedCells[] = [$x + $i, $y - $i]; // Diagonal 2
                }
            }
        } elseif ($powerUp == 'torpedo') {
            for ($j = 1; $j <= BOARD_SIZE; $j++) {
                $affectedCells[] = [$x, $j]; // Entire row
            }
        } else {
            // Single shot if no powerup is selected
            $affectedCells[] = [$x, $y];
        }

        $_SESSION['shotsUsed'] += count($affectedCells);

        // Process all affected cells
        foreach ($affectedCells as $coords) {
            [$i, $j] = $coords;
            $actualValue = $_SESSION['board'][$i][$j];

            if ($actualValue == '#') {
                foreach ($ships as $index => $ship) {
                    if ($shipTrackers[$index][$i][$j]) {
                        $ship->setHitBefore(true);
                        $ship->setHitCount($ship->getHitCount() + 1);
                        $_SESSION['displayBoard'][$i][$j] = 'hit';

                        if ($ship->hitCount == $ship->length) {
                            $status = "hit and sunk!";
                            $ship->setSunk(true);
                            $_SESSION['shipsLeft']--;
                        } else {
                            $status = 'hit';
                        }
                    }
                }
            } else {
                $_SESSION['displayBoard'][$i][$j] = 'miss';
            }
        }

        $_SESSION['ship1'] = $ship1;
        $_SESSION['ship2'] = $ship2;
        $_SESSION['ship3'] = $ship3;
        $_SESSION['ship4'] = $ship4;
        $_SESSION['ship5'] = $ship5;
        $_SESSION['ship6'] = $ship6;
        $_SESSION['ship7'] = $ship7;

        // Prepare the result message
        $fireResult = "<p class='fire-result'>Fired at coordinates ($x, $y): " . ucfirst($status) . "</p>";
    }
}

// Reset the game board
if (isset($_POST['reset']) || ($_SESSION['shipsLeft'] == 0 && isset($_SESSION['scoreSubmitted']))) {
    $_SESSION['board'] = loadBoardFromFile();
    $_SESSION['shipsLeft'] = 7;
    $_SESSION['shotsUsed'] = 0;
    $_SESSION['displayBoard'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
    $_SESSION['areAllSunk'] = false;

    unset($_POST['submitScore']);
    unset($_SESSION['scoreSubmitted']); // Ensure this is reset for the next game
    unset($_SESSION['ship1']);
    unset($_SESSION['reset']);
    unset($_SESSION['modalShown']);
}


$fireResult = '';

if (!isset($_SESSION['areAllSunk'])) {
    $_SESSION['areAllSunk'] = false;
}

if (!isset($_SESSION['shotsUsed'])) {
    $_SESSION['shotsUsed'] = 0;
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


if (isset($_SESSION['ship1'])) {
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


// Check if the player has won and has not submitted the score yet
if ($_SESSION['shipsLeft'] == 0 && !isset($_SESSION['modalShown']) && !isset($_SESSION['scoreSubmitted'])) {
    echo "
    <script>
        window.onload = function() {
            document.getElementById('winModal').style.display = 'block';
        };
    </script>";

    $_SESSION['modalShown'] = true;

}

// Handle form submission to the leaderboard
if (isset($_POST['submitScore']) && $_SESSION['shotsUsed'] != 0) {
    $name = $_POST['playerName'];
    $shotsUsed = $_SESSION['shotsUsed'];

    // Query to retrieve the highest number so far in the Primary Key
    $sqlIncrementValueQuery = "SELECT MAX(id) FROM leaderboard;";
    $valueToIncrement = mysqli_query($_SESSION['dbConnection'], $sqlIncrementValueQuery);
    $incrementValueArray = mysqli_fetch_row($valueToIncrement);
    $incrementValue = $incrementValueArray[0] + 1;

    // Prepare the SQL statement with placeholders this prepared statement will assist in preventing vulnerability to SQL injection
    $stmt = mysqli_prepare($_SESSION['dbConnection'], "INSERT INTO leaderboard (id, name, shots) VALUES (?, ?, ?)");

    // Bind the parameters (i: integer, s: string)
    mysqli_stmt_bind_param($stmt, "isi", $incrementValue, $name, $shotsUsed);

    if (mysqli_stmt_execute($stmt)) {

        $_SESSION['scoreSubmitted'] = true;
        $_SESSION['reset'] = true;
        unset($_POST['submitScore']);

        $_SESSION['board'] = loadBoardFromFile();
        $_SESSION['shipsLeft'] = 7;
        $_SESSION['shotsUsed'] = 0;
        $_SESSION['displayBoard'] = array_fill(1, BOARD_SIZE, array_fill(1, BOARD_SIZE, ''));
        $_SESSION['areAllSunk'] = false;

        unset($_SESSION['scoreSubmitted']); // Reset the flag to allow modal to show again
        unset($_SESSION['ship1']);

        echo "
        <script>
            closeModal();
            resetBoard();
        </script>";
    } else {
        echo "<p class='error'>Error submitting score. Please try again.</p>";
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battleship Game - Shoot Your Shot</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1b1f23;
            color: #e3e4e6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            background-color: #2c3136;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
        }

        .battleForm {
            background-color: rgba(300, 300, 300, 0);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #ffa500;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .board {
            display: grid;
            grid-template-columns: repeat(25, 0.5fr);
            grid-template-rows: repeat(25, 0.5fr);
            gap: 0.5rem;
            justify-content: center;
            margin-bottom: 20px;
        }

        .cell {
            width: 24px;
            height: 24px;
            background-color: #454c54;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .cell:hover {
            background-color: #616871;
        }

        .cell.hit {
            background-color: #ff453a;
        }

        .cell.miss {
            background-color: #9da5ad;
        }

        .cell.selected {
            pointer-events: none; /* Disable re-selection */
        }

        .ships-left {
            font-size: 18px;
            font-weight: 600;
            color: #ffa500;
            text-align: left;
            margin: 15px 0;
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
        }

        .fire-result {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            color: #ffa500;
        }

        .reset-button {
            background-color: #ff4500;
            color: white;
            border: none;
            font-weight: bold;
            padding: 14px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 8px;
            margin-top: 20px;
            width: 100%;
        }

        .reset-button:hover {
            background-color: #e63e00;
        }

        body {
            text-align: center;
            background: linear-gradient(180deg, #1b1f23, #121417);
        }

        .hiddenForm {
            display: none;
        }

        .cell.hovered {
            background-color: lightblue;
        }

        .powerUps {
            background-color: rgba(100, 100, 100, 0);
            border: none;
            box-shadow: none;
            outline: none;
        }

        .powerups-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #33383e;
            border-radius: 10px;
            box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .power-button {
            background-color: #ffa500;
            color: #2c3136;
            border: none;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .power-button:hover {
            background-color: #ff8c00;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .power-button.active {
            background-color: #ff4500;
            transform: scale(1.05);
            color: white;
        }

        /* Leaderboard Container */
        .leaderboard-container {
            position: fixed;
            left: 30px;
            top: 100px;
            width: 180px; /* Reduced width */
            padding: 15px; /* Adjust padding */
            background-color: #33383e;
            color: #e3e4e6;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .leaderboard {
            text-align: center;
            font-size: 18px; /* Reduced font size */
            font-weight: 700;
            margin-bottom: 15px; /* Less margin */
            color: #ffa500;
        }

        .leaderboard-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px; /* Reduced font size */
        }

        .leaderboard-table th, .leaderboard-table td {
            padding: 6px; /* Smaller padding */
            text-align: left;
            border-bottom: 1px solid #454c54;
        }

        .leaderboard-table th {
            background-color: #454c54;
            color: #ffa500;
            font-weight: 600;
        }

        .leaderboard-table td {
            background-color: #2c3136;
        }

        .leaderboard-table tr:hover {
            background-color: #3a4148;
        }

        .leaderboard-table td:first-child {
            font-weight: 600;
        }

        #winModal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        #winModal p {
            color: #102e4a;
        }

        #winModal div {
            position: relative;
            margin: auto;
            top: 20%;
            width: 320px;
            background-color: white;
            padding: 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        #winModal h2 {
            color: #ff4500;
            font-weight: 700;
            margin-bottom: 20px;
        }

        #winModal form input[type="text"] {
            padding: 10px;
            width: 80%;
            border: 2px solid #ffa500;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        #winModal form button {
            background-color: #ff4500;
            color: #102e4a;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 6px;
        }

        #winModal form button:hover {
            background-color: #e63e00;
        }

        .fa-times {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Media Query for Mobile */
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 10px;
                margin: 0 auto;
            }

            .board {
                display: grid;
                grid-template-columns: repeat(25, minmax(12px, 1fr)); /* Ensure grid items adjust evenly */
                grid-template-rows: repeat(25, minmax(12px, 1fr));    /* Same for rows */
                gap: 0.1rem; /* Smaller gap between cells for better fit */
                justify-content: center;
            }

            .cell {
                width: calc(100vw / 26);  /* Make sure cells fit within the screen width */
                height: calc(100vw / 26); /* Maintain square cells */
                max-width: 20px;  /* Limit maximum size */
                max-height: 20px;
                background-color: #454c54;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                border-radius: 2px;
                transition: background-color 0.3s ease;
            }

            .cell.hit {
                background-color: #ff453a;
            }

            .cell.miss {
                background-color: #9da5ad;
            }

            /* Adjust leaderboard */
            .leaderboard-container {
                position: relative;
                clear: right;
                width: 85%;
                margin: 0 0 8rem;
                padding: 0.6rem;
                background-color: #2c3136;
                border-radius: 8px;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            }

            .leaderboard {
                font-size: 16px;
            }

            .leaderboard-table th, .leaderboard-table td {
                font-size: 12px;
                padding: 5px;
            }

            /* Adjust title and spacing */
            h1 {
                font-size: 22px;
                margin-bottom: 10px;
            }

            .ships-left {
                font-size: 16px;
                margin: 10px 0;
            }

            /* Reduce padding on reset button */
            .reset-button {
                padding: 10px;
                font-size: 14px;
            }

            /* Power-ups buttons adjusted for mobile */
            .powerups-container {
                flex-direction: column;
                align-items: stretch;
                margin-top: 20px;
            }

            .power-button {
                font-size: 12px;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 6px;
            }
        }

        /* Adjust smaller screens (phones) */
        @media (max-width: 480px) {
            .container {
                padding: 5px;
            }

            .board {
                grid-template-columns: repeat(25, minmax(8px, 1fr)); /* Smaller grid cells */
                grid-template-rows: repeat(25, minmax(8px, 1fr));
                gap: 0.05rem; /* Minimal gap between cells */
            }

            .cell {
                width: calc(100vw / 28);  /* Further adjustment for very small screens */
                height: calc(100vw / 28);
            }

            .leaderboard-container {
                position: relative;
                max-width: 400px;
                width: 80%;
                margin: 0 auto;
                padding: 0.6rem; /* Adjust padding */
                background-color: #2c3136;
                border-radius: 8px;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            }

            .leaderboard {
                font-size: 16px;
            }

            .leaderboard-table th, .leaderboard-table td {
                font-size: 12px;
                padding: 5px;
            }

            /* Smaller reset button */
            .reset-button {
                font-size: 12px;
                padding: 8px;
            }

            /* Reduce margins for ships-left */
            .ships-left {
                font-size: 14px;
                margin: 5px 0;
            }

            /* Smaller power-up buttons */
            .power-button {
                font-size: 10px;
                padding: 8px;
            }
        }

        /* Default leaderboard styling */
        .leaderboard-content {
            display: block;
        }

        /* Toggle button styling */
        .toggle-leaderboard {
            background-color: #ffa500;
            color: #2c3136;
            border: none;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        /* Media Query for Mobile - Collapsible functionality */
        @media (max-width: 768px) {
            .leaderboard-content {
                display: none; /* Hide leaderboard by default on mobile */
            }
        }
    </style>

    <script>
        // JavaScript to handle cell click and auto-submit the form
        function handleCellClick(x, y) {
            document.getElementById('xCoordinate').value = x;
            document.getElementById('yCoordinate').value = y;
            document.battleForm.submit(); // Submit the form automatically
        }

        // Function to toggle the leaderboard visibility
        function toggleLeaderboard() {
            const leaderboardContent = document.getElementById("leaderboardContent");
            const toggleButton = document.querySelector(".toggle-leaderboard");

            // Toggle visibility of the leaderboard content
            if (leaderboardContent.style.display === "none" || leaderboardContent.style.display === "") {
                leaderboardContent.style.display = "block";
                toggleButton.textContent = "Hide Leaderboard";
            } else {
                leaderboardContent.style.display = "none";
                toggleButton.textContent = "Show Leaderboard";
            }
        }

        // Function to update the leaderboard button text based on screen size and visibility
        function updateLeaderboardButton() {
            const leaderboardContent = document.getElementById("leaderboardContent");
            const toggleButton = document.querySelector(".toggle-leaderboard");

            // Check screen width to determine if leaderboard should be displayed by default
            if (window.innerWidth <= 768) {
                // On mobile, hide the leaderboard and set button text to "Show Leaderboard"
                leaderboardContent.style.display = "none";
                toggleButton.textContent = "Show Leaderboard";
            } else {
                // On larger screens, display the leaderboard and set button text to "Hide Leaderboard"
                leaderboardContent.style.display = "block";
                toggleButton.textContent = "Hide Leaderboard";
            }
        }

        // Add event listeners for page load and resize to update the leaderboard button correctly
        window.addEventListener("load", updateLeaderboardButton);
        window.addEventListener("resize", updateLeaderboardButton);
    </script>
</head>
<body>
<div class="leaderboard-container">
    <button class="toggle-leaderboard" onclick="toggleLeaderboard()">Show Leaderboard</button>
    <div id="leaderboardContent" class="leaderboard-content">
        <h3 class="leaderboard">Leaderboard</h3>
        <table class="leaderboard-table">
            <thead>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Shots Taken</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($leaderBoardResults)): ?>
                <tr>
                    <td><?php echo $row['Ranking']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Shots Taken']; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

    <div class="container">
        <h1 class="title">Fire Your Shot!</h1>

        <!-- Display ships left -->
        <div class="ships-left">
            Ships Left: <?php echo $_SESSION['shipsLeft']; ?>
        </div>

        <div class="ships-left">
            Shots Used: <?php echo $_SESSION['shotsUsed']; ?>
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

        <!-- Modal for submitting score -->
        <div id="winModal" style="display: none;">
            <div>
        <span onclick="closeModal()">
            <i class="fas fa-times"></i>
        </span>
                <h2>You've Won!</h2>
                <p>Your Score: <?php echo $_SESSION['shotsUsed']; ?></p>
                <p>Enter your name to submit your score:</p>
                <form method="POST" onsubmit="hideModalOnSubmit()">
                    <input type="text" name="playerName" placeholder="Your Name" required>
                    <input type="hidden" name="shotsUsed" value="<?php echo $_SESSION['shotsUsed']; ?>">
                    <button type="submit" name="submitScore">Submit</button>
                </form>
            </div>
        </div>

        <!-- Form to submit coordinates (now auto-filled and auto-submitted) -->
        <form name="battleForm" method="POST" class="hiddenForm">
            <input type="hidden" name="xCoordinate" id="xCoordinate">
            <input type="hidden" name="yCoordinate" id="yCoordinate">
            <input type="hidden" name="powerUpType" id="powerUpType">
        </form>
        <form method="POST" name="powerUpsForm" class="powerUps">
            <div class="powerups-container">
                <button type="button" class="power-button" name="cannon">Cannon</button>
                <button type="button" class="power-button" name="airRaid">Air Raid</button>
                <button type="button" class="power-button" name="torpedo">Torpedo</button>
            </div>
        </form>

        <form method="POST" class="battleForm">
            <button class="reset-button" name="reset">New Board</button>
        </form>

    </div>
</div>

</body>

<script>
    let selectedPowerUp = null;

    // Add event listeners for the powerup buttons
    document.querySelectorAll('.power-button').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Prevent form submission

            // Toggle active state on the buttons
            if (selectedPowerUp === this.name) {
                // Deselect if the same button is clicked
                selectedPowerUp = null;
                deselectAllPowerupButtons();
            } else {
                // Select a new powerup and highlight
                selectedPowerUp = this.name;
                highlightSelectedPowerupButton(this);
            }
        });
    });

    // Deselect all power-up buttons
    function deselectAllPowerupButtons() {
        document.querySelectorAll('.power-button').forEach(btn => btn.classList.remove('active'));
    }

    // Highlight the selected power-up button
    function highlightSelectedPowerupButton(button) {
        deselectAllPowerupButtons();  // Remove active state from all buttons
        button.classList.add('active');  // Add active state to the clicked button
    }

    // Handle cell click and submit the form with the powerup
    function handleCellClick(x, y) {
        document.getElementById('xCoordinate').value = x;
        document.getElementById('yCoordinate').value = y;

        // If no power-up is selected, this will pass null (single shot)
        document.getElementById('powerUpType').value = selectedPowerUp;

        document.battleForm.submit(); // Submit the form only on cell click
    }

    // Attach hover events to each cell
    function attachHoverEvents() {
        const cells = document.querySelectorAll('.cell');
        cells.forEach(cell => {
            const x = cell.getAttribute('data-x');
            const y = cell.getAttribute('data-y');

            cell.addEventListener('mouseover', () => handleCellHover(x, y));
            cell.addEventListener('mouseout', resetHoverEffect);
        });
    }

    // Display hover effect for selected powerup
    function handleCellHover(x, y) {
        resetHoverEffect(); // Reset previous hover effects

        if (selectedPowerUp === 'cannon') {
            highlightCannon(x, y);
        } else if (selectedPowerUp === 'airRaid') {
            highlightAirRaid(x, y);
        } else if (selectedPowerUp === 'torpedo') {
            highlightTorpedo(x, y);
        }
    }

    function resetHoverEffect() {
        let cells = document.querySelectorAll('.cell');
        cells.forEach(cell => cell.classList.remove('hovered')); // Reset hover effect
    }

    function highlightCannon(x, y) {
        x = parseInt(x); // Convert to integer
        y = parseInt(y); // Convert to integer

        for (let i = x - 1; i <= x + 1; i++) {
            for (let j = y - 1; j <= y + 1; j++) {
                // Ensure the coordinates are within bounds
                if (i >= 1 && i <= <?php echo BOARD_SIZE; ?> && j >= 1 && j <= <?php echo BOARD_SIZE; ?>) {
                    highlightCell(i, j);
                }
            }
        }
    }

    function highlightAirRaid(x, y) {
        x = parseInt(x); // Convert to integer
        y = parseInt(y); // Convert to integer

        for (let i = -2; i <= 2; i++) {
            // Diagonal 1
            if (x + i >= 1 && x + i <= <?php echo BOARD_SIZE; ?> && y + i >= 1 && y + i <= <?php echo BOARD_SIZE; ?>) {
                highlightCell(x + i, y + i);
            }
            // Diagonal 2
            if (x + i >= 1 && x + i <= <?php echo BOARD_SIZE; ?> && y - i >= 1 && y - i <= <?php echo BOARD_SIZE; ?>) {
                highlightCell(x + i, y - i);
            }
        }
    }

    function highlightTorpedo(x, y) {
        for (let j = 1; j <= <?php echo BOARD_SIZE; ?>; j++) {
            highlightCell(x, j); // Highlight the entire row
        }
    }

    function highlightCell(x, y) {
        let cell = document.querySelector(`[data-x='${x}'][data-y='${y}']`);
        if (cell) {
            cell.classList.add('hovered');
        }
    }

    // Call the function to attach hover events once the board is rendered
    attachHoverEvents();
</script>
<script>
    // Function to hide the modal after the form is submitted
    function hideModalOnSubmit() {
        document.getElementById('winModal').style.display = 'none';
    }

    function closeModal() {
        document.getElementById('winModal').style.display = 'none';
    }

    // Function to reset the board after score submission
    function resetBoard() {
        // Reload the page to start a new game with the reset board
        window.location.reload();
    }
</script>
</html>