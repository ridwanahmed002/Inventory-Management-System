<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->conn;  

$action = $_GET['action'] ?? '';

if ($action == 'list') {
    header('Content-Type: application/json');
    $result = $db->getWarehouseIdAndLocation($conn);
    
    if ($result) {
        $warehouses = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($warehouses);
    } else {
        echo json_encode([]);
    }
    
} elseif ($action == 'delete' && isset($_GET['warehouse_id'])) {
    header('Content-Type: application/json');
    $warehouseId = $_GET['warehouse_id'];
    $success = $db->deleteWarehouse($conn, $warehouseId);
    echo json_encode(['success' => (bool)$success]);
}

$db->closeConn();
?>
