<?php
include '../model/db.php';  // Make sure this path correctly points to your db.php
session_start();

if (isset($_REQUEST['submit'])) {
    $uname = $_REQUEST['uname'];
    $pass = $_REQUEST['pass'];

    if (empty($uname) || empty($pass)) {
        echo "Username and Password cannot be empty";  // Simple error message if fields are empty.
    } else {
        $db = new db();  // Create a new instance of the database class.
        $conn = $db->openConn();  // Open the database connection.
        $result = $db->loginAdmin($conn, $uname, $pass);  // Use the loginAdmin function with the provided credentials.

        if ($result->num_rows == 0) {
            echo "Invalid credentials";  // Inform user if no matching credentials are found.
        } else {
            $_SESSION["username"] = $uname;  // Set session variable on successful login.
            header("Location: ../view/adminhome.php");  // Redirect to home.php in the view folder.
        }
        $db->closeConn();  // Close the database connection.
    }
}
?>
