<?php
include('../model/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productType = $_POST['product_type'];
    $orders = $db->getOrdersByProductType($productType);
    echo '<table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Product Type</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Payment ID</th>
            </tr>';
    while ($row = $orders->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['product_type'] . '</td>
                <td>' . $row['quantity'] . '</td>
                <td>' . $row['size'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['payment_method'] . '</td>
                <td>' . $row['payment_id'] . '</td>
              </tr>';
    }
    echo '</table>';
}
?>
