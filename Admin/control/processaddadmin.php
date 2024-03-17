<?php
require_once '../model/db.php';

// Utility functions for validation
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidPassword($password) {
    // Add your validation logic here
    return preg_match('/[0-9]/', $password) && preg_match('/[\W]/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db();
    $conn = $db->openConn();

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = $_POST['pass'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!isValidEmail($email) || !isValidPassword($pass)) {
        die("Invalid email format or password criteria not met.");
    }

    // Check for existing username or email
    $checkQuery = "SELECT * FROM admin WHERE uname = '$uname' OR email = '$email'";
    $result = $conn->query($checkQuery);
    if ($result->num_rows > 0) {
        die("Username or email already exists.");
    }

    // Insert new admin
    $passHash = password_hash($pass, PASSWORD_DEFAULT); // Hash the password
    $insertQuery = "INSERT INTO admin (uname, pass, email) VALUES ('$uname', '$passHash', '$email')";
    if (!$conn->query($insertQuery)) {
        die("Error adding admin.");
    }

    echo "New admin added successfully.";
    $db->closeConn($conn);
}
?>