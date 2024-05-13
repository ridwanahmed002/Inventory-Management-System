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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <div class="options">
        <button onclick="window.location.href='search_product.php'">Search Product</button>
        <button onclick="window.location.href='cart.php'">Cart</button>
        <button onclick="window.location.href='history.php'">History</button>
    </div>
</body>
</html>
