<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->openConn();

$searchBy = $_POST['searchBy'];
$searchValue = $_POST['searchValue'];

// Determine search type and execute
if ($searchBy == 'contact') {
    $result = $db->searchEmployeeByContact($conn, $searchValue);
} elseif ($searchBy == 'employee_id') {
    $result = $db->searchEmployeeById($conn, $searchValue);
} else {
    // Handle invalid search type
    echo "Invalid search type.";
    exit;
}

if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
    // Redirect to the edit employee page with employee details
    header("Location: ../view/editemployee.php?employee_id=" . $employee['employee_id'] . "&fname=" . urlencode($employee['fname']) . "&lname=" . urlencode($employee['lname']) . "&email=" . urlencode($employee['email']) . "&section=" . urlencode($employee['section']) . "&phone=" . urlencode($employee['contact']));
} else {
    echo "No employee found.";
    echo "<button onclick=\"window.location.href='searchemployee.php';\">Back</button>";
}

$db->closeConn($conn);
?>