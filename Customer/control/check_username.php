<?php
include('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    if ($db->isUsernameTaken($username)) {
        echo "true";
    } else {
        echo "false";
    }
}
?>
