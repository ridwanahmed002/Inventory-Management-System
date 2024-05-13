<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Orders by Product Type</title>
    <link rel="stylesheet" href="../css/search_by_product_type.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/search_by_product_type.js"></script>
</head>
<body>
    <div class="search-container">
        <h2>Search Orders by Product Type</h2>
        <label for="product_type">Product Type:</label>
        <select id="product_type" name="product_type" onchange="fetchOrders()">
            <option value="">Select Product Type</option>
            <option value="Chair">Chair</option>
            <option value="Table">Table</option>
            <option value="Sofa">Sofa</option>
            <option value="Almira">Almira</option>
            <option value="Bench">Bench</option>
        </select>
        <div id="orders_table"></div>
        <button onclick="window.location.href='history.php'">Back</button>
    </div>
</body>
</html>
