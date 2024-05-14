<?php

class UserModel {
    private $conn;

    public function __construct() {
        // Database credentials
        $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
        $username = "root"; // Username for MySQL
        $password = ""; // Password for MySQL, leave empty if no password is set
        $dbname = "inventorymanagementdb"; // Name of your database

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        // Close connection
        $this->conn->close();
    }

    public function createUser($first_name, $last_name, $email, $dob, $password, $mobile, $gender) {
        $query = "INSERT INTO users (first_name, last_name, email, dob, password, mobile, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $dob, $password, $mobile, $gender);
        return $stmt->execute();
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
