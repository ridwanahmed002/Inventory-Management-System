<?php
include '../model/db.php';
$db = new db();
$conn = $db->openConn();

if (isset($_POST['update'])) {
    $employee_id = $_POST['employee_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $section = $_POST['section'];

    $result = $db->updateEmployee($conn, $employee_id, $fname, $lname, $age, $gender, $email, $contact, $address, $section);
    if ($result) {
        echo "<script>alert('Employee updated successfully.'); window.location.href='../view/employeeManagement.php';</script>";
    } else {
        echo "<script>alert('Failed to update employee.'); window.history.back();</script>";
    }
}
$db->closeConn();
?>
