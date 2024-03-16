<?php
session_start(); 

require_once '../model/db.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $db = new db();
    $conn = $db->openConn();

    $result = $db->loginAdmin($conn, $uname, $pass);
    
    if ($result->num_rows > 0) {
        $_SESSION['uname'] = $uname; 
        $db->closeConn($conn); 
        header("Location: ../view/adminhome.php"); 
        exit();
    } else {
        $db->closeConn($conn); 
        header("Location: ../view/adminlogin.php?error=Invalid%20Credentials"); 
        exit();
    }
} else {
    header("Location: ../view/adminlogin.php");
    exit();
}
?>