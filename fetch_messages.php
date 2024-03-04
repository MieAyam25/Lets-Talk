<?php
// Include database connection or initialize your database connection here

// Retrieve messages from the database
// Prepare your SQL statement to select messages from tb_message table
// Execute the SQL statement and fetch results

// Example code (ensure to replace with your actual database interaction)
/*
$sql = "SELECT * FROM tb_message";
$result = $conn->query($sql);
$messages = $result->fetch_all(MYSQLI_ASSOC);
*/
$conn = mysqli_connect("localhost", "root", "", "upload");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Return the fetched messages as JSON data
echo json_encode($messages);
?>
