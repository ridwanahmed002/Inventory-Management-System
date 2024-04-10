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
    // 2 functions for remove admin

    function deleteAdmin($conn, $admin_id) {
        $sqlstr = "DELETE FROM admin WHERE admin_id = '$admin_id'";
        return $conn->query($sqlstr);
    }

    function getAdminIdAndUname($conn) {
        $sqlstr = "SELECT admin_id, uname FROM admin";
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

    function contactExists($conn, $contact) {
        $sql = "SELECT * FROM employee WHERE contact = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $contact);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }

    function getAllEmployees($conn) {
        $sqlstr = "SELECT * FROM employee";
        return $conn->query($sqlstr);
    }
    
    
    function deleteEmployee($conn, $employee_id) {
        $sqlstr = "DELETE FROM employee WHERE employee_id = $employee_id";
        return $conn->query($sqlstr);
    }

    function getEmployeeIdAndContact($conn) {
        $sqlstr = "SELECT employee_id, contact,section FROM employee";
        return $conn->query($sqlstr);
    }
    function updateEmployee($employee_id, $fname, $lname, $age, $gender, $contact, $email, $address, $section) {
        $stmt = $this->conn->prepare("UPDATE employee SET fname=?, lname=?, age=?, gender=?, contact=?, email=?, address=?, section=? WHERE employee_id=?");
        $stmt->bind_param("ssississi", $fname, $lname, $age, $gender, $contact, $email, $address, $section, $employee_id);
        $result = $stmt->execute();
        return $result;
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