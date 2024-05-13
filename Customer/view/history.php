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
    <title>Order History</title>
    <link rel="stylesheet" href="../css/history.css">
</head>
<body>
    <div class="history-container">
        <h2>Order History</h2>
        <button onclick="window.location.href='show_all_orders.php'">Show All</button>
        <button onclick="window.location.href='search_by_product_type.php'">Search by Product Type</button>
        <button onclick="window.location.href='dashboard.php'">Back</button>
    </div>
</body>
</html>
