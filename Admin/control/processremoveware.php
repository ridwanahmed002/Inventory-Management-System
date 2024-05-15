<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['warehouseId'])) {
    $warehouseId = $_POST['warehouseId'];
    $db = new db();
    $conn = $db->openConn();
    $result = $db->deleteWarehouse($conn, $warehouseId);

    if ($result && $conn->affected_rows > 0) {
        echo "Warehouse successfully deleted.";
    } else {
        echo "Failed to delete warehouse or warehouse not found.";
    }
} else {
    echo "No warehouse ID provided.";
}
?>
