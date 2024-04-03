<?php
// Start the session
session_start();

// Include the database connection file
require_once '../model/db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $db = new db();
    $conn = $db->openConn();

    $result = $db->loginAdmin($conn, $uname, $pass);

    if ($result->num_rows > 0) {
        $_SESSION['uname'] = $uname;
        $db->closeConn($conn);
        header("Location: ../view/adminhome.php");
        exit();
    } else {
        $db->closeConn($conn);
        // Echo a JavaScript snippet that will display an alert and redirect back to login
        echo "<script>
                alert('Incorrect username or password, please try again.');
                window.location.href='../view/adminlogin.php';
              </script>";
        exit();
    }
} else {
    header("Location: ../view/adminlogin.php");
    exit();
}
?>