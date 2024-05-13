<?php
include('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $location = $_POST['location'];

    if (empty($username) || empty($password) || empty($email) || empty($phone) || empty($gender) || empty($age) || empty($location)) {
        echo "All fields are required.";
    } else {
        if ($db->isUsernameTaken($username)) {
            echo "Username is already taken.";
        } else {
            if ($db->createCustomer($username, $password, $email, $phone, $gender, $age, $location)) {
                echo "Account created successfully";
            } else {
                echo "Error: " . $db->conn->error;
            }
        }
    }
}
?>
