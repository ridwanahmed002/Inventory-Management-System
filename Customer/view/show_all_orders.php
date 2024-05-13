<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

$orders = $db->getAllOrders();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="../css/show_all_orders.css">
</head>
<body>
    <div class="orders-container">
        <h2>All Orders</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Payment ID</th>
            </tr>
            <?php while ($row = $orders->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['product_type']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['payment_id']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <button onclick="window.location.href='history.php'">Back</button>
    </div>
</body>
</html>
