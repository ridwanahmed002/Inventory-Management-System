<?php
// Database credentials
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

// Include the UserModel class
include 'model.php';

// Create a UserModel object with the database connection
$userModel = new UserModel($conn);

// Sign-up logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Collect form data for registration
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];

    // Validation checks (if required)

    // If there are no errors, create user
    $password_hashed = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $result = $userModel->createUser($first_name, $last_name, $email, $dob, $password_hashed, $mobile, $gender);

    if ($result) {
        // Redirect to the home page after successful registration
        header("Location: home.php");
        exit(); // Stop further execution
    } else {
        // Display error message
        echo "Error occurred while registering user!";
    }
}

// Sign-in logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    // Collect sign-in form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Attempt to sign in the user
    $user = $userModel->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        // User authenticated successfully
        // Start session to persist user login status
        session_start();

        // Store user data in session
        $_SESSION['user'] = $user;

        // Redirect to the home page after successful sign-in
        header("Location: home.php");
        exit(); // Stop further execution
    } else {
        // Sign-in failed
        echo "Invalid email or password.";
    }
}

// Close connection
$conn->close();
?>
