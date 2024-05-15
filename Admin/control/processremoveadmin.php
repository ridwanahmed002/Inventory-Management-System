<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adminId'])) {
    $adminId = $_POST['adminId'];
    $db = new db();
    $conn = $db->openConn();

    $result = $db->deleteAdmin($conn, $adminId);
    

    if ($conn->affected_rows > 0) {
        echo "Admin successfully removed.";
    } else {
        echo "No admin found with ID: $adminId";
    }

} else {
    echo "No admin ID provided.";
}
?>
