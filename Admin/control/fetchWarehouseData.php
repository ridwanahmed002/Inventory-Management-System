<?php
require_once '../model/db.php';

$db = new db();
$conn = $db->conn;

$sql = "SELECT location, SUM(capacity) as capacity FROM warehouse GROUP BY location";
$result = $conn->query($sql);

$locations = [];
$capacities = [];
while ($row = $result->fetch_assoc()) {
    $locations[] = $row['location'];
    $capacities[] = $row['capacity'];
}

header('Content-Type: application/json');
echo json_encode(['labels' => $locations, 'values' => $capacities]);

$conn->close();
?>
