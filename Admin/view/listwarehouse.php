<?php
include '../control/processlistwarehouses.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Warehouses</title>
    <link rel="stylesheet" href="../css/list.css">
</head>
<body>
    <h1>List of Warehouses</h1>
    <?php
    if ($result->num_rows>0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>
                <th>Warehouse ID</th>
                <th>Location</th>
                <th>Full Location</th>
                <th>Capacity</th>
                <th>Number of Employees</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($result as $row) {
            echo "<tr>";
            echo "<td>".$row['warehouse_id']."</td>";
            echo "<td>".$row['location']."</td>";
            echo "<td>".$row['full_location']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo "<td>".$row['no_of_employee']."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No warehouse records found.</p>";
    }
    echo "<a href='warehousemanagement.php' class='back-button'>Back</a>";
    ?>
</body>
</html>
