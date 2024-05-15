<?php
include '../model/db.php';  // Using include as per your format instruction

$db = new db();
$conn = $db->openConn();  // Open the database connection
$adminsData = $db->getAllAdmins($conn);  // Fetch all admins from the database

