<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "customer"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function loginCustomer($username, $password) {
        $sqlstr = "SELECT username, password FROM customer WHERE username = '$username' AND password = '$password'";
        return $this->conn->query($sqlstr);
    }

    public function createCustomer($username, $password, $email, $phone, $gender, $age, $location) {
        $sqlstr = "INSERT INTO customer (username, password, email, phone, gender, age, location) VALUES ('$username', '$password', '$email', '$phone', '$gender', '$age', '$location')";
        return $this->conn->query($sqlstr);
    }

    public function isUsernameTaken($username) {
        $sqlstr = "SELECT username FROM customer WHERE username = '$username'";
        return $this->conn->query($sqlstr)->num_rows > 0;
    }

    public function addToCart($productType, $quantity, $size, $address, $paymentMethod, $username) {
        $sqlstr = "INSERT INTO cart (username, product_type, quantity, size, address, payment_method) VALUES ('$username', '$productType', '$quantity', '$size', '$address', '$paymentMethod')";
        return $this->conn->query($sqlstr);
    }

    public function getCartItems($username) {
        $sqlstr = "SELECT * FROM cart WHERE username = '$username'";
        return $this->conn->query($sqlstr);
    }

    public function deleteCartItem($id) {
        $sqlstr = "DELETE FROM cart WHERE id = '$id'";
        return $this->conn->query($sqlstr);
    }

    public function updateCartItem($id, $productType, $quantity, $size, $address, $paymentMethod) {
        $sqlstr = "UPDATE cart SET product_type = '$productType', quantity = '$quantity', size = '$size', address = '$address', payment_method = '$paymentMethod' WHERE id = '$id'";
        return $this->conn->query($sqlstr);
    }

    public function saveOrder($username, $productType, $quantity, $size, $address, $paymentMethod, $paymentId) {
        $sqlstr = "INSERT INTO orders (username, product_type, quantity, size, address, payment_method, payment_id) VALUES ('$username', '$productType', '$quantity', '$size', '$address', '$paymentMethod', '$paymentId')";
        return $this->conn->query($sqlstr);
    }

    public function getAllOrders() {
        $sqlstr = "SELECT * FROM orders";
        return $this->conn->query($sqlstr);
    }

    public function getOrdersByProductType($productType) {
        $sqlstr = "SELECT * FROM orders WHERE product_type = '$productType'";
        return $this->conn->query($sqlstr);
    }
}


$db = new Database();
?>
