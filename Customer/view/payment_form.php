<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

$method = isset($_GET['method']) ? $_GET['method'] : '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $method == 'advance') {
    $cardNumber = $_POST['card_number'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $paymentId = uniqid();

    // Simulate successful payment
    $paymentSuccessful = true;

    if ($paymentSuccessful) {
        // Save order information
        $cartItems = $db->getCartItems($_SESSION['username']);
        while ($item = $cartItems->fetch_assoc()) {
            $saveResult = $db->saveOrder(
                $_SESSION['username'],
                $item['product_type'],
                $item['quantity'],
                $item['size'],
                $item['address'],
                'Advance Payment',
                $paymentId
            );
            // Log the save result
            if (!$saveResult) {
                error_log("Failed to save order: " . $db->conn->error);
            }
            // Delete item from cart after saving order
            $deleteResult = $db->deleteCartItem($item['id']);
            if (!$deleteResult) {
                error_log("Failed to delete cart item: " . $db->conn->error);
            }
        }

        $message = "Payment successful! Order ID: " . $paymentId;
    } else {
        $message = "Payment failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="../css/payment_form.css">
    <script src="../js/payment_form.js"></script>
</head>
<body>
    <div class="payment-form-container">
        <h2>Payment Form</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <?php if ($method == 'advance'): ?>
            <form action="" method="post" onsubmit="return validatePaymentForm()">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number"><br>
                <span id="cardNumberError"></span><br>

                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY"><br>
                <span id="expiryDateError"></span><br>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv"><br>
                <span id="cvvError"></span><br>

                <input type="submit" value="Proceed">
            </form>
        <?php endif; ?>
        <button type="button" onclick="window.location.href='payment_options.php'">Back</button>
    </div>
</body>
</html>
