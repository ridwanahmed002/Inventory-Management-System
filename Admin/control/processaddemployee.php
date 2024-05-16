<?php
include '../model/db.php';

$fname = $lname = $email = $contact = $address = $section = "";
$age = 0;
$gender = "";
$hasError = 0;
$errorMsg = "";

if(isset($_REQUEST['submit'])){
    $db = new db();
    $conn = $db->openConn();

    $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
    $lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
    $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : 0;
    $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $contact = isset($_REQUEST['contact']) ? $_REQUEST['contact'] : '';
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
    $section = isset($_REQUEST['section']) ? $_REQUEST['section'] : '';

    if (empty($fname) || empty($lname)) {
        $hasError = 1;
        $errorMsg .= "First and last names are required. ";
    }
    if (empty($email)) {
        $hasError = 1;
        $errorMsg .= "Email is required. ";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasError = 1;
        $errorMsg .= "Please enter a valid email address. ";
    }
    if ($age <= 17) {
        $hasError = 1;
        $errorMsg .= "Age must be greater than 17. ";
    }
    if (empty($contact)) {
        $hasError = 1;
        $errorMsg .= "Contact is required. ";
    }

    if($hasError != 1){
        $result = $db->addEmployee($conn, $fname, $lname, $age, $gender, $email, $contact, $address, $section);
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
