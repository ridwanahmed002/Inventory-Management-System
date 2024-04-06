<?php
require_once '../model/db.php'; 

function getWarehouseData() {
    $db = new db();
    $conn = $db->openConn();

    $result = $db->getAllWarehouse($conn);

    $db->closeConn($conn);

    return $result;
}