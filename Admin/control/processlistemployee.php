<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->openConn();
$result = $db->getAllEmployees($conn);  


?>
