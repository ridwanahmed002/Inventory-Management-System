<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Warehouse</title>
    <link rel="stylesheet" href="../css/addwarehouse.css">
</head>

<body>
    <div class="form-container">
        <h2>Add Warehouse</h2>
        <form id="addWarehouseForm" action="../control/processaddwarehouse.php" method="post">
            <label for="warehouse_id">Warehouse ID:</label>
            <input type="text" id="warehouse_id" name="warehouse_id">

            <label for="full_location">Full Location:</label>
            <textarea id="full_location" name="full_location"></textarea>

            <label for="total_capacity">Total Capacity:</label>
            <input type="number" id="total_capacity" name="total_capacity">

            <label for="no_of_employees">No. of Employees:</label>
            <input type="number" id="no_of_employees" name="no_of_employees">

            <label for="location">Location:</label>
            <select id="location" name="location">
                <option value="">Select Location</option>
                <option value="Dhaka">Dhaka</option>
                <!-- More locations here -->
            </select>

            <div class="buttons">
                <button type="submit">Proceed</button>
                <button type="button" onclick="window.location='warehousemanagement.php';">Back</button>
            </div>
        </form>
    </div>
    <script src="addwarehouse.js"></script>
</body>

</html>