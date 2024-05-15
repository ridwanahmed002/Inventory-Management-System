<?php
include '../control/processlistadmins.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Admins</title>
    <link rel="stylesheet" href="../css/list.css">
</head>
<body>
    <h1>List of Admins</h1>
    <?php 
    if ($adminsData->num_rows>0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>
                <th>Admin ID</th>
                <th>Username</th>
                <th>Email</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($adminsData as $row) {
            echo "<tr>";
            echo "<td>" . $row['admin_id'] . "</td>";
            echo "<td>" . $row['uname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No admin records found.</p>";
    }
    echo "<a href='adminmanagement.php' class='back-button'>Back</a>";
    ?>
</body>
</html>
