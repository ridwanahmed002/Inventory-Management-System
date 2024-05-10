<?php
require_once '../model/db.php';

function fetchAllEmployees() {
    $db = new db();  // Initialize the db object
    $conn = $db->conn;  // Get the connection from the db object
    $result = $db->getAllEmployees($conn);  // Fetch all employees
    $db->closeConn();  // Close the connection
    return $result;
}
?>
