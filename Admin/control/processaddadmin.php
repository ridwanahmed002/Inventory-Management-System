<?php
session_start();
require_once '../model/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new db();
$conn = $db->openConn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
    $email = $_POST['email'];

    $userCheck = $conn->query("SELECT uname FROM admin WHERE uname = '$uname'");
    if ($userCheck->num_rows > 0) {
        $_SESSION['error_message'] = 'Duplicate username.';
        header("Location: ../view/addadmin.php");
        exit();
    }

    $result = $db->addAdmin($conn, $uname, $pass, $email);
    if ($result) {
        $_SESSION['add_admin_success'] = 'Admin added successfully!';
    } else {
        $_SESSION['error_message'] = 'There was a problem adding the admin.';
    }
    $db->closeConn($conn);
    header("Location: ../view/addadmin.php");
    exit();
}
?>