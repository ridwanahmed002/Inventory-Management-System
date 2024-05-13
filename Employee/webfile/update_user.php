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

// Retrieve data sent via AJAX POST request
$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];

// Prepare SQL statement to update user data using prepared statements
$sql = "UPDATE users SET first_name=?, 
    last_name=?, email=?, dob=?,
    mobile=?, gender=? 
    WHERE user_id=?";

$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ssssssi", $first_name, $last_name, $email, $dob, $mobile, $gender, $user_id);

// Execute the prepared statement
if ($stmt->execute()) {
    // Fetch the updated user data from the database
    $updatedUserData = array(
        'user_id' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'dob' => $dob,
        'mobile' => $mobile,
        'gender' => $gender
    );
    
    // Return the updated user data as JSON response
    header('Content-Type: application/json');
    echo json_encode($updatedUserData);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Error updating user information: ' . $conn->error
    );
    echo json_encode($response);
}

// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>
