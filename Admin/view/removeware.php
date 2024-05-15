<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Warehouse</title>
    <link rel="stylesheet" href="../css/remove.css">
</head>
<body>
    <div class="container">
        <h1>Delete Warehouse</h1>
        <div class="form-group">
            <label for="warehouseId">Warehouse ID:</label>
            <input type="text" id="warehouseId" name="warehouseId">
        </div>
        <div class="button-group">
            <button type="button" onclick="removeWarehouse()">Delete Warehouse</button>
            <a href="warehousemanagement.php" class="back-button">Back</a>
        </div>
        <div id="message"></div>
    </div>
    <script src="../js/removeware.js"></script>
</body>
</html>
