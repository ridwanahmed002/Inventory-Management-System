<?php
require_once '../model/db.php';

function fetchAllAdmins() {
    $db = new db();
    $conn = $db->openConn();
    $admins = $db->getAllAdmins($conn);
    $db->closeConn($conn);
    return $admins;
}