<?php
require_once '../model/db.php';
$db = new db();
$conn = $db->openConn();

$action = $_POST['action'] ?? ''; 

if ($action === 'search') {
    $contact = $_POST['contact'] ?? ''; 
    $result = $db->searchEmployeeByContact($conn, $contact);

    if ($result && $result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        echo json_encode(['success' => true, 'employee' => $employee]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No employee found with that contact number.']);
    }
} 

$db->closeConn();
?>