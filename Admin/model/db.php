<?php

class db {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Admin";

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

    function searchAdmin($conn, $uname) {
        $sqlstr = "SELECT * FROM admin WHERE uname = '$uname'";
        return $conn->query($sqlstr);
    }
    
    function deleteAdmin($conn, $uname) {
        $sqlstr = "DELETE FROM admin WHERE uname = '$uname'";
        return $conn->query($sqlstr);
    }

    
    
    // Retrieve all admin data
    function getAllAdmins($conn) {
        $sqlstr = "SELECT * FROM admin";
        return $conn->query($sqlstr);
    }

    // addEmployee 
    function addEmployee($conn, $fname, $lname, $age, $gender, $email, $contact, $address, $section) {
        $sqlstr = "INSERT INTO employee (fname, lname, age, gender, email, contact, address, section) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("ssisssss", $fname, $lname, $age, $gender, $email, $contact, $address, $section);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    function getAllEmployees($conn) {
        $sqlstr = "SELECT * FROM employee";
        return $conn->query($sqlstr);
    }

    function updateEmployee($conn, $employee_id, $fname, $lname, $email, $section, $contact, $age, $gender, $address) {
        $sqlstr = "UPDATE employee SET fname='$fname', lname='$lname', email='$email', section='$section', contact='$contact', age='$age', gender='$gender', address='$address' WHERE employee_id='$employee_id'";
        return $conn->query($sqlstr);
    }

    function deleteEmployeeById($conn, $id) {
        $sqlstr = "DELETE FROM employee WHERE id = '$id'";
        return $conn->query($sqlstr);
    }
    // Search for employees by id
    function searchEmployeeById($conn, $employee_id) {
        $sqlstr = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
        return $conn->query($sqlstr);
    }
    // Search employee by contact
    function searchEmployeeByContact($conn, $contact) {
        $sqlstr = "SELECT * FROM employee WHERE contact = '$contact'";
        return $conn->query($sqlstr);
    }

    // Add warehouse
    function addWarehouse($conn, $warehouse_id, $location, $full_location, $capacity, $no_of_employee) {
        $sqlstr = "INSERT INTO warehouse (warehouse_id, location, full_location, capacity, no_of_employee) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("sssss", $warehouse_id, $location, $full_location, $capacity, $no_of_employee);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Retrieve all warehouse data
    function getAllWarehouse($conn) {
        $sqlstr = "SELECT * FROM warehouse";
        return $conn->query($sqlstr);
    }

    function deleteWarehouse($conn, $warehouse_id) {
        $sqlstr = "DELETE FROM warehouse WHERE warehouse_id = $warehouse_id";
        return $conn->query($sqlstr);
    }

    function getWarehouseIdAndLocation($conn) {
        $sqlstr = "SELECT warehouse_id, full_location FROM warehouse";
        $result = $conn->query($sqlstr);
        return $result;
    }



    function closeConn($conn) {
        $conn->close();
    }
}

?>