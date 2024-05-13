<?php
session_start();
include('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username and Password are required.";
    } else {
        $result = $db->loginCustomer($username, $password);

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: ../view/dashboard.php");
        } else {
            echo "Invalid Username or Password.";
        }
    }
}
?>
