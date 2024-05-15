<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];
    $db = new db();
    $conn = $db->openConn();
    $result = $db->deleteEmployee($conn, $employeeId);

    if ($result && $conn->affected_rows > 0) {
        echo "Employee successfully deleted.";
    } else {
        echo "Failed to delete employee or employee not found.";
    }
} else {
    echo "No employee ID provided.";
}
?>
