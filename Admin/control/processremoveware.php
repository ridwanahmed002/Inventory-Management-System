<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->openConn();

$action = $_GET['action'] ?? '';

if ($action == 'list') {
    // Fetch and send warehouse data as JSON
    header('Content-Type: application/json');
    $result = $db->getWarehouseIdAndLocation($conn);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($action == 'delete' && isset($_GET['warehouse_id'])) {
    // Call the delete function and return success or failure
    header('Content-Type: application/json');
    $warehouseId = $_GET['warehouse_id'];
    $success = $db->deleteWarehouse($conn, $warehouseId);
    echo json_encode(['success' => $success]);
}

$db->closeConn();
?>