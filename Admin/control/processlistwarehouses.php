<?php
require_once '../model/db.php'; 

function getWarehouseData() {
    $db = new db();
    $conn = $db->conn;
    $result = $db->getAllWarehouse($conn);
    $db->closeConn();
    return $result;
}