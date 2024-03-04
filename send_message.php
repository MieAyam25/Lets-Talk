<?php
// Include database connection or initialize your database connection here

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve message content and user ID from the request
    $message = $_POST["message"];
    $userId = $_POST["userId"]; // You need to ensure you have user authentication

    // Initialize database connection
    $conn = mysqli_connect("localhost", "root", "", "upload");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize and validate message content if needed

    // Insert the message into the database
    $sql = "INSERT INTO tb_message (id, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $userId, $message);
    $stmt->execute();

    // Close database connection
    $stmt->close();
    $conn->close();

    // Return a response if necessary
    echo json_encode(["status" => "success", "message" => "Message sent successfully"]);
} else {
    // Return an error response if the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo json_encode(["status" => "error", "message" => "Only POST requests are allowed"]);
}
