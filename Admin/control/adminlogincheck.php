<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
var_dump(file_exists('../model/db.php')); 
require_once __DIR__ . '/../model/db.php';// Adjust the path as needed.
function testFunction() {
    return "It works!";
}

echo testFunction(); // Should output "It works!"


$username = $_POST['username'];
$password = $_POST['password'];

$result = loginAdmin($conn, $username, $password);

if ($result->num_rows === 1) {
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;
    
    // Set a cookie for the username, lasting 1 day
    setcookie("username", $username, time() + 86400, "/");

    // Redirect to the admin home page
    header("Location: ../view/adminhome.php");
    exit();
} else {
    // If credentials are invalid, set an error message and redirect back to login
    $_SESSION['login_error'] = 'Invalid username or password.';
    header("Location: ../view/adminlogin.php");
    exit();
}
?>