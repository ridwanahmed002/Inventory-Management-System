<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if ($db->deleteCartItem($id)) {
        $message = "Item deleted successfully.";
    } else {
        $message = "Error deleting item: " . $db->conn->error;
    }
}

$cartItems = $db->getCartItems($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <div class="cart-container">
        <h2>Your Cart</h2>
        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <table>
            <tr>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $cartItems->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_type']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td>
                        <a href="edit_cart_item.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="cart.php?delete=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <button onclick="window.location.href='dashboard.php'">Back</button>
        <button onclick="window.location.href='payment_options.php'">Proceed to Payment</button>
    </div>
</body>
</html>
