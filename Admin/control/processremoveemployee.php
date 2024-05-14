<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->conn;  

$action = $_GET['action'] ?? '';

if ($action == 'list') {
    header('Content-Type: application/json');
    $result = $db->getEmployeeIdAndContact($conn);
    
    if ($result) {
        $employees = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($employees);
    } else {
        echo json_encode([]);
    }
    
} elseif ($action == 'delete' && isset($_GET['employee_id'])) {
    header('Content-Type: application/json');
    $employeeId = $_GET['employee_id'];
    $success = $db->deleteEmployee($conn, $employeeId);
    echo json_encode(['success' => $success]);
}

$db->closeConn();
?>
