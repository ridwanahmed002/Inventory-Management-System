<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->conn; 

$action = $_GET['action'] ?? '';

if ($action == 'list') {
    header('Content-Type: application/json');
    $result = $db->getAdminIdAndUname($conn);
    
    if ($result) {
        $admins = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($admins);
    } else {
        echo json_encode([]);
    }
    
} elseif ($action == 'delete' && isset($_GET['admin_id'])) {
    header('Content-Type: application/json');
    $adminId = $_GET['admin_id'];
    $success = $db->deleteAdmin($conn, $adminId);
    echo json_encode(['success' => $success]);
}

$db->closeConn();
?>
