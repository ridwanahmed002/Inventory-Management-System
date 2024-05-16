<?php
include '../model/db.php';
$db = new db();
$conn = $db->openConn();
$contact = $_GET['contact'];

$result = $db->searchEmployeeByContact($conn, $contact);
if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Edit</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
        echo "<td><a href='../view/editEmployee.php?employee_id=" . $row['employee_id'] . "'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No employee found with that contact number.";
}

?>
