<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->conn; // Ensure the connection is available

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $warehouseId = $_POST['warehouse_id'];
    $fullLocation = $_POST['full_location'];
    $capacity = $_POST['total_capacity']; // Using total_capacity from the form to match with capacity in DB
    $noOfEmployees = $_POST['no_of_employees'];
    $location = $_POST['location'];

    if ($capacity < 100 || $noOfEmployees < 5) {
        $error = $capacity < 100 ? "capacity_error" : "employee_error";
        header("Location: ../view/addwarehouse.php?error=$error");
        exit();
    } else {
        // Debugging: Log the received data
        error_log("Warehouse ID: $warehouseId, Full Location: $fullLocation, Capacity: $capacity, No. of Employees: $noOfEmployees, Location: $location");

        // Attempt to add the warehouse to the database
        $result = $db->addWarehouse($conn, $warehouseId, $location, $fullLocation, $capacity, $noOfEmployees);

        if ($result) {
            header("Location: ../view/addwarehouse.php?success=1");
        } else {
            error_log("Database insertion failed: " . $conn->error); // Log any database errors
            header("Location: ../view/addwarehouse.php?error=general");
        }
        exit();
    }
}

$db->closeConn();
?>
