<?php
require_once '../model/db.php';

function fetchAllEmployees() {
    $db = new db();
    $conn = $db->openConn();
    $result = $db->getAllEmployees($conn);
    $db->closeConn($conn);
    
    return $result;
}