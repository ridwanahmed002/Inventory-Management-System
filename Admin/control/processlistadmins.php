<?php
require_once '../model/db.php';

function fetchAllAdmins() {
    $db = new db();
    $conn = $db->conn;
    $admins = $db->getAllAdmins($conn);
    $db->closeConn();
    return $admins;
}