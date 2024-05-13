<?php
// Database connection settings
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Username for MySQL
$password = ""; // Password for MySQL, leave empty if no password is set
$dbname = "inventorymanagementdb"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM users WHERE user_id = $user_id"; // Adjust the table name and column name as per your database structure
    $conn->query($sql);  
    $conn->close();
} else {
    // If user_id is not set or empty in the GET request, return an error message
    echo "Error: User ID not provided";
}
?>
