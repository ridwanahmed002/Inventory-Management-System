<?php
require_once '../model/db.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);


$db = new db();
$conn = $db->openConn();

if (isset($_POST['warehouse_id'])) {
    $warehouseId = $_POST['warehouse_id'];
    $fullLocation = $_POST['full_location'];
    $totalCapacity = $_POST['total_capacity'];
    $noOfEmployees = $_POST['no_of_employees'];
    $location = $_POST['location'];

    $result = $db->addWarehouse($conn, $warehouseId, $location, $fullLocation, $totalCapacity, $noOfEmployees);

    $db->closeConn($conn);

    if ($result) {
        echo "<script>alert('Warehouse successfully added.'); window.location.href='../view/addwarehouse.php';</script>";
    } else {
        echo "<script>alert('Error adding warehouse.'); window.history.back();</script>";
    }
} else {
    echo "No data received.";
}
?>