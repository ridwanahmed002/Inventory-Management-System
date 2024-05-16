<?php
include '../model/db.php';

$warehouse_id = $location = $full_location = "";
$capacity = $no_of_employee = 0;
$hasError = 0;
$errorMsg = "";

if(isset($_REQUEST['submit'])){
    $db = new db();
    $conn = $db->openConn();

    $warehouse_id = isset($_REQUEST['warehouse_id']) ? $_REQUEST['warehouse_id'] : '';
    $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : '';
    $full_location = isset($_REQUEST['full_location']) ? $_REQUEST['full_location'] : '';
    $capacity = isset($_REQUEST['capacity']) ? $_REQUEST['capacity'] : 0;
    $no_of_employee = isset($_REQUEST['no_of_employee']) ? $_REQUEST['no_of_employee'] : 0;

    // Validate fields
    if (empty($warehouse_id)) {
        $hasError = 1;
        $errorMsg .= "Warehouse ID is required.\\n";
    }
    if (empty($full_location)) {
        $hasError = 1;
        $errorMsg .= "Full location is required.\\n";
    }
    if ($capacity < 50) {
        $hasError = 1;
        $errorMsg .= "Capacity must be at least 50.\\n";
    }
    if ($no_of_employee < 5) {
        $hasError = 1;
        $errorMsg .= "Number of employees must be at least 5.\\n";
    }

    if($hasError != 1){
        $result = $db->addWarehouse($conn, $warehouse_id, $location, $full_location, $capacity, $no_of_employee);

        if($result === TRUE){
            echo "Successfully Added";
        } else {
            echo "Error Occurred: " . $conn->error;
        }
    } else {
        echo "Please complete the validation: " . $errorMsg;
    }
}
?>
