<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "customer"; // Database name
    public $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
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
}

// Initialize Database object
$db = new Database();
?>
