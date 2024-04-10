<?php

class db {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Admin";

    private $conn;

    public function __construct() {
        $this->openConn(); // This is called automatically when a new instance is created
    }

    private function openConn() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error); // Ideally, handle this more gracefully
        }
    }

    // Admin login
    function loginAdmin($uname, $pass) {
        $sqlstr = "SELECT uname, pass FROM admin WHERE uname = '$uname' AND pass = '$pass'";
        $result = $this->conn->query($sqlstr);
        return $result;
    }

    // Add admin
    function addAdmin($conn, $uname, $pass, $email) {
        $sqlstr = "INSERT INTO admin (uname, pass, email) VALUES ('$uname', '$pass', '$email')";
        $result = $this->conn->query($sqlstr);
        return $result;
    }
    public function query($sql) {
        return $this->conn->query($sql);
    }

    function searchAdmin($conn, $uname) {
        $sqlstr = "SELECT * FROM admin WHERE uname = '$uname'";
        $result = $this->conn->query($sqlstr);
        return $result;
    }
    // 2 functions for remove admin

    function deleteAdmin($conn, $admin_id) {
        $sqlstr = "DELETE FROM admin WHERE admin_id = '$admin_id'";
        $result = $this->conn->query($sqlstr);
        return $result;
    }

    function getAdminIdAndUname($conn) {
        $sqlstr = "SELECT admin_id, uname FROM admin";
        $result = $this->conn->query($sqlstr);
        return $result;
    }
    
    // Retrieve all admin data
    function getAllAdmins($conn) {
        $sqlstr = "SELECT * FROM admin";
        $result = $this->conn->query($sqlstr);
        return $result;
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
        $sqlstr = "UPDATE employee SET fname='$fname', lname='$lname', age=$age, gender='$gender', contact='$contact', email='$email', address='$address', section='$section' WHERE employee_id=$employee_id";
        $result = $this->conn->query($sqlstr);
        return $result;
    }
    
    function searchEmployeeByContact($contact) {
        $sqlstr = "SELECT * FROM employee WHERE contact = '$contact'";
        return $this->conn->query($sqlstr);
    }


    // Add warehouse
    function addWarehouse($conn, $warehouse_id, $location, $full_location, $capacity, $no_of_employee) {
        $sqlstr = "INSERT INTO warehouse (warehouse_id, location, full_location, capacity, no_of_employee) VALUES ('$warehouse_id', '$location', '$full_location', '$capacity', '$no_of_employee')";
        $result = $this->conn->query($sqlstr);
        return $result;
    }
    

    // Retrieve all warehouse data
    function getAllWarehouse($conn) {
        $sqlstr = "SELECT * FROM warehouse";
        $result = $this->conn->query($sqlstr);
        return $result;
    }

    function deleteWarehouse($conn, $warehouse_id) {
        $sqlstr = "DELETE FROM warehouse WHERE warehouse_id = $warehouse_id";
        $result = $this->conn->query($sqlstr);
        return $result;
    }

    function getWarehouseIdAndLocation($conn) {
        $sqlstr = "SELECT warehouse_id, full_location FROM warehouse";
        $result = $this->conn->query($sqlstr);
        return $result;
    }



    public function closeConn() {
        if ($this->conn != null) {
            $this->conn->close();
        }
    }
}

?>