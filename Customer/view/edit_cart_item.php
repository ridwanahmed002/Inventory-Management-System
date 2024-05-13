<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->getCartItems($_SESSION['username']);
    $item = $result->fetch_assoc();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productType = $_POST['product_type'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $address = $_POST['address'];
    $paymentMethod = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';

    if ($quantity <= 0) {
        $message = "Quantity must be greater than 0.";
    } else {
        if ($db->updateCartItem($id, $productType, $quantity, $size, $address, $paymentMethod)) {
            $message = "Item updated successfully.";
        } else {
            $message = "Error: " . $db->conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cart Item</title>
    <link rel="stylesheet" href="../css/edit_cart_item.css">
    <script src="../js/edit_cart_item.js"></script>
</head>
<body>
    <div class="edit-container">
        <h2>Edit Cart Item</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="" method="post" onsubmit="return validateEditForm()">
            <label for="product_type">Type:</label>
            <select id="product_type" name="product_type">
                <option value="Chair" <?php if ($item['product_type'] == 'Chair') echo 'selected'; ?>>Chair</option>
                <option value="Table" <?php if ($item['product_type'] == 'Table') echo 'selected'; ?>>Table</option>
                <option value="Sofa" <?php if ($item['product_type'] == 'Sofa') echo 'selected'; ?>>Sofa</option>
                <option value="Almira" <?php if ($item['product_type'] == 'Almira') echo 'selected'; ?>>Almira</option>
                <option value="Bench" <?php if ($item['product_type'] == 'Bench') echo 'selected'; ?>>Bench</option>
            </select><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo $item['quantity']; ?>" min="1"><br>
            <span id="quantityError"></span><br>

            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="Big" <?php if ($item['size'] == 'Big') echo 'selected'; ?>>Big</option>
                <option value="Medium" <?php if ($item['size'] == 'Medium') echo 'selected'; ?>>Medium</option>
                <option value="Small" <?php if ($item['size'] == 'Small') echo 'selected'; ?>>Small</option>
            </select><br>

            <label for="address">Address:</label>
            <select id="address" name="address">
                <option value="Dhaka" <?php if ($item['address'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                <option value="Khulna" <?php if ($item['address'] == 'Khulna') echo 'selected'; ?>>Khulna</option>
                <option value="Rangpur" <?php if ($item['address'] == 'Rangpur') echo 'selected'; ?>>Rangpur</option>
            </select><br>

            <label>Payment Method:</label>
            <input type="checkbox" id="cod" name="payment_method" value="Cash on Delivery" <?php if ($item['payment_method'] == 'Cash on Delivery') echo 'checked'; ?>>
            <label for="cod">Cash on Delivery</label>
            <input type="checkbox" id="adv" name="payment_method" value="Advance Payment" <?php if ($item['payment_method'] == 'Advance Payment') echo 'checked'; ?>>
            <label for="adv">Advance Payment</label><br>

            <input type="submit" value="Proceed">
            <button type="button" onclick="window.location.href='cart.php'">Back</button>
        </form>
    </div>
</body>
</html>
