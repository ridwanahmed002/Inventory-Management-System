<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Consider hashing the password before storing it
    $email = $_POST['email'];

    $db = new db();
    $conn = $db->openConn();
    $result = $db->addAdmin($conn, $username, $password, $email);

    if ($result) {
        echo "New admin added successfully.";
    } else {
        echo "Failed to add new admin.";
    }
} else {
    echo "All fields are required.";
}
?>
