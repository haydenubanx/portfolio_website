<?php
// Database connection details
$hostname = "o0i.h.filess.io";
$database = "SentimentAnalysis_facingwent";
$port     = "3307";
$username = "SentimentAnalysis_facingwent";
$password = "5fd4719c1fc36d0e9439458916ab87bbefab578e";

// Set up connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select comments and their sentiment from the database
$sql = "SELECT sentiment, comment_text FROM comments";

// Execute the query
$result = $conn->query($sql);

// Initialize an array to store the comments and sentiments
$comments = array();

if ($result->num_rows > 0) {
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $comments[] = array(
            "sentiment" => $row["sentiment"],  // Sentiment (0 for negative, 4 for positive)
            "comment_text" => $row["comment_text"]  // Comment text
        );
    }
}

// Close the database connection
$conn->close();

// Set the header to return JSON and output the comments array
header('Content-Type: application/json');
echo json_encode($comments);
?>