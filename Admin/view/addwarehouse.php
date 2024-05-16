<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Warehouse</title>
    <link rel="stylesheet" href="../css/addwarehouse.css">
</head>
<body>
    <div class="container">
        <h1>Add New Warehouse</h1>
        <form action="../control/processaddwarehouse.php" method="post">
            <label for="warehouse_id">Warehouse ID:</label>
            <input type="text" id="warehouse_id" name="warehouse_id">

            <label for="location">Location:</label>
            <select id="location" name="location">
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Rangpur">Rangpur</option>
            </select>

            <label for="full_location">Full Address:</label>
            <input type="text" id="full_location" name="full_location">

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" min="50">

            <label for="no_of_employee">Number of Employees:</label>
            <input type="number" id="no_of_employee" name="no_of_employee" min="5">

            <button type="submit" name="submit">Add Warehouse</button>
            <button type="button" onclick="window.location.href='warehouseManagement.php';">Back</button>
        </form>
    </div>
</body>
</html>
