<?php
require_once '../model/db.php';
$db = new db();
$conn = $db->openConn();

$action = $_POST['action'] ?? ''; // Use null coalescing to avoid undefined index notice

if ($action === 'search') {
    $contact = $_POST['contact'] ?? ''; // Again, avoiding undefined index notice
    $result = $db->searchEmployeeByContact($conn, $contact);

    if ($result && $result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        echo json_encode(['success' => true, 'employee' => $employee]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No employee found with that contact number.']);
    }
} // Consider adding an else block to handle other actions or invalid requests

$db->closeConn();
?>