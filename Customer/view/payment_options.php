<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

$message = '';

if (isset($_GET['method']) && $_GET['method'] == 'cod') {
    $paymentId = uniqid();

    $cartItems = $db->getCartItems($_SESSION['username']);
    while ($item = $cartItems->fetch_assoc()) {
        $db->saveOrder(
            $_SESSION['username'],
            $item['product_type'],
            $item['quantity'],
            $item['size'],
            $item['address'],
            'Cash on Delivery',
            $paymentId
        );

        $db->deleteCartItem($item['id']);
    }

    $message = "Order placed successfully! Order ID: " . $paymentId;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <link rel="stylesheet" href="../css/payment_options.css">
</head>
<body>
    <div class="payment-container">
        <h2>Select Payment Method</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <button onclick="window.location.href='payment_form.php?method=advance'">Advance Payment</button>
        <button onclick="window.location.href='payment_options.php?method=cod'">Cash on Delivery</button>
        <button onclick="window.location.href='cart.php'">Back</button>
    </div>
</body>
</html>
