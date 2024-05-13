<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: customer_login.php");
    exit();
}
include('../model/db.php');

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
        if ($db->addToCart($productType, $quantity, $size, $address, $paymentMethod, $_SESSION['username'])) {
            echo "<script>alert('Product added to cart successfully!');</script>";
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
    <title>Search Product</title>
    <link rel="stylesheet" href="../css/search_product.css">
    <script src="../js/search_product.js"></script>
</head>
<body>
    <div class="search-container">
        <h2>Search Product</h2>
        <form action="" method="post" onsubmit="return validateSearchForm()">
            <label for="product_type">Type:</label>
            <select id="product_type" name="product_type">
                <option value="Chair">Chair</option>
                <option value="Table">Table</option>
                <option value="Sofa">Sofa</option>
                <option value="Almira">Almira</option>
                <option value="Bench">Bench</option>
            </select><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1"><br>
            <span id="quantityError"></span><br>

            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="Big">Big</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
            </select><br>

            <label for="address">Address:</label>
            <select id="address" name="address">
                <option value="Dhaka">Dhaka</option>
                <option value="Khulna">Khulna</option>
                <option value="Rangpur">Rangpur</option>
            </select><br>

            <label>Payment Method:</label>
            <input type="checkbox" id="cod" name="payment_method" value="Cash on Delivery">
            <label for="cod">Cash on Delivery</label>
            <input type="checkbox" id="adv" name="payment_method" value="Advance Payment">
            <label for="adv">Advance Payment</label><br>

            <input type="submit" value="Add to Cart">
            <input type="reset" value="Reset">
            <button type="button" onclick="window.location.href='dashboard.php'">Back</button>
        </form>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
