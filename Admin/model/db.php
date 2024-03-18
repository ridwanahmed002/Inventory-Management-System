<?php

class db {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Admin";

    // Open connection to the database
    function openConn() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Admin login
    function loginAdmin($conn, $uname, $pass) {
        $sqlstr = "SELECT uname, pass FROM admin WHERE uname = '$uname' AND pass = '$pass'";
        return $conn->query($sqlstr);
    }

    // Add admin
    function addAdmin($conn, $uname, $pass, $email) {
        $sqlstr = "INSERT INTO admin (uname, pass, email) VALUES ('$uname', '$pass', '$email')";
        return $conn->query($sqlstr);
    }

    // Search admin by uname
    function searchAdmin($conn, $uname) {
        $sqlstr = "SELECT * FROM admin WHERE uname = '$uname'";
        return $conn->query($sqlstr);
    }

    // Delete admin by username
    function deleteAdmin($conn, $uname) {
        $sqlstr = "DELETE FROM admin WHERE uname = '$uname'";
        return $conn->query($sqlstr);
    }
    
    // Retrieve all admin data
    function getAllAdmins($conn) {
        $sqlstr = "SELECT * FROM admin";
        return $conn->query($sqlstr);
    }

    // Updated addEmployee function to include email
    function addEmployee($conn, $fname, $lname, $age, $gender, $email, $contact, $address, $section) {
        $sqlstr = "INSERT INTO employee (fname, lname, age, gender, email, contact, address, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("ssisssss", $fname, $lname, $age, $gender, $email, $contact, $address, $section);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    // Retrieve all employees data
    function getAllEmployees($conn) {
        $sqlstr = "SELECT * FROM employee";
        return $conn->query($sqlstr);
    }

    // Update employee
    function updateEmployee($conn, $id, $fname, $lname, $email, $section, $phone) {
        $sqlstr = "UPDATE employee SET fname='$fname', lname='$lname', email='$email', section='$section', phone='$phone' WHERE id='$id'";
        return $conn->query($sqlstr);
    }

    // Delete employee by ID
    function deleteEmployeeById($conn, $id) {
        $sqlstr = "DELETE FROM employee WHERE id = '$id'";
        return $conn->query($sqlstr);
    }

    // Search employee by email
    function searchEmployeeByEmail($conn, $email) {
        $sqlstr = "SELECT * FROM employee WHERE email = '$email'";
        return $conn->query($sqlstr);
    }

    // Search employee by phone
    function searchEmployeeByPhone($conn, $phone) {
        $sqlstr = "SELECT * FROM employee WHERE phone = '$phone'";
        return $conn->query($sqlstr);
    }

    // Add warehouse
    function addWarehouse($conn, $name, $location) {
        $sqlstr = "INSERT INTO warehouse (name, location) VALUES ('$name', '$location')";
        return $conn->query($sqlstr);
    }

    // Remove warehouse by ID
    function removeWarehouseById($conn, $id) {
        $sqlstr = "DELETE FROM warehouse WHERE id = '$id'";
        return $conn->query($sqlstr);
    }

    // Get customer support information by section
    function getCustomerSupportBySection($conn, $section) {
        $sqlstr = "SELECT email, phone FROM employee WHERE section = '$section'";
        return $conn->query($sqlstr);
    }

    // Close connection to the database
    function closeConn($conn) {
        $conn->close();
    }
}

?>