<?php
require_once '../model/db.php'; 

$db = new db();
$conn = $db->openConn(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['username'] ?? '';

    if (empty($uname)) {
        echo "Please enter a username.";
    } else {
        $result = $db->searchAdmin($conn, $uname);
        
        if ($result->num_rows > 0) {
            echo "Admin found. Proceed with deletion? <br>";

            $delete = $db->deleteAdmin($conn, $uname);
            
            if ($delete) {
                echo "Admin successfully removed.";
            } else {
                echo "Error removing admin.";
            }
        } else {
            echo "No admin found with that username.";
        }
    }
} else {
    header("Location: ../view/adminmanagement.php");
    exit();
}

$db->closeConn($conn);
?>