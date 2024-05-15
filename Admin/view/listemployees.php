<?php
include '../control/processlistemployee.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Employees</title>
    <link rel="stylesheet" href="../css/list.css">
</head>
<body>
    <h1>List of Employees</h1>
    <?php
    if ($result->num_rows>0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Section</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($result as $row) {
            echo "<tr>";
            echo "<td>".$row['employee_id']."</td>";
            echo "<td>".$row['fname']."</td>";
            echo "<td>".$row['lname']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['contact']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['section']."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No employee records found.</p>";
    }
    echo "<a href='employeemanagement.php' class='back-button'>Back</a>";
    ?>
</body>
</html>
