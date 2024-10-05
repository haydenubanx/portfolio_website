<?php
// Allow CORS from any origin
header("Access-Control-Allow-Origin: *");  // Allow all origins
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");  // Allow specific methods
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Allow specific headers


// Database connection details
$hostname = "bzBpLmguZmlsZXNzLmlv";
$database = "U2VudGltZW50QW5hbHlzaXNfZmFjaW5nd2VudA==";
$port     = "3307";
$username = "U2VudGltZW50QW5hbHlzaXNfZmFjaW5nd2VudA==";
$password = "NWZkNDcxOWMxZmMzNmQwZTk0Mzk0NTg5MTZhYjg3YmJlZmFiNTc4ZQ==";

// Set up connection to the MySQL database
$conn = new mysqli(base64_decode($hostname), base64_decode($username), base64_decode($password), base64_decode($database), $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select comments and their sentiment from the database
$sql = "SELECT sentiment, comment_text FROM youtube_comments";

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