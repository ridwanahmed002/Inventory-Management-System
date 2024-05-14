<?php

class db {
    function openConn() {
        $conn = new mysqli("localhost", "root", "", "Admin");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function loginAdmin($conn, $uname, $pass) {
        $sql = "SELECT uname, pass FROM admin WHERE uname = '$uname' AND pass = '$pass'";
        $result = $conn->query($sql);
        return $result;
    }

    function addAdmin($conn, $uname, $pass, $email) {
        $sql = "INSERT INTO admin (uname, pass, email) VALUES ('$uname', '$pass', '$email')";
        $result = $conn->query($sql);
        return $result;
    }

    function searchAdmin($conn, $uname) {
        $sql = "SELECT * FROM admin WHERE uname = '$uname'";
        $result = $conn->query($sql);
        return $result;
    }

    function deleteAdmin($conn, $admin_id) {
        $sql = "DELETE FROM admin WHERE admin_id = '$admin_id'";
        $result = $conn->query($sql);
        return $result;
    }

    function getAdminIdAndUname($conn) {
        $sql = "SELECT admin_id, uname FROM admin";
        $result = $conn->query($sql);
        return $result;
    }

    function getAllAdmins($conn) {
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        return $result;
    }

    function addEmployee($conn, $fname, $lname, $age, $gender, $email, $contact, $address, $section) {
        $sql = "INSERT INTO employee (fname, lname, age, gender, email, contact, address, section) VALUES ('$fname', '$lname', $age, '$gender', '$email', '$contact', '$address', '$section')";
        $result = $conn->query($sql);
        return $result;
    }

    function contactExists($conn, $contact) {
        $sql = "SELECT * FROM employee WHERE contact = '$contact'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    function getAllEmployees($conn) {
        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
        return $result;
    }

    function escape($conn, $string) {
        return $conn->real_escape_string($string);
    }

    function deleteEmployee($conn, $employee_id) {
        $sql = "DELETE FROM employee WHERE employee_id = $employee_id";
        $result = $conn->query($sql);
        return $result;
    }

    function getEmployeeIdAndContact($conn) {
        $sql = "SELECT employee_id, contact, section FROM employee";
        $result = $conn->query($sql);
        return $result;
    }

    function updateEmployee($conn, $employee_id, $fname, $lname, $age, $gender, $contact, $email, $address, $section) {
        $sql = "UPDATE employee SET fname='$fname', lname='$lname', age=$age, gender='$gender', contact='$contact', email='$email', address='$address', section='$section' WHERE employee_id=$employee_id";
        $result = $conn->query($sql);
        return $result;
    }

    function searchEmployeeByContact($conn, $contact) {
        $sql = "SELECT * FROM employee WHERE contact = '$contact'";
        $result = $conn->query($sql);
        return $result;
    }

    function addWarehouse($conn, $warehouse_id, $location, $full_location, $capacity, $no_of_employee) {
        $sql = "INSERT INTO warehouse (warehouse_id, location, full_location, capacity, no_of_employee) VALUES ('$warehouse_id', '$location', '$full_location', '$capacity', '$no_of_employee')";
        $result = $conn->query($sql);
        return $result;
    }

    function getAllWarehouse($conn) {
        $sql = "SELECT * FROM warehouse";
        $result = $conn->query($sql);
        return $result;
    }

    function deleteWarehouse($conn, $warehouse_id) {
        $sql = "DELETE FROM warehouse WHERE warehouse_id = $warehouse_id";
        $result = $conn->query($sql);
        return $result;
    }

    function getWarehouseIdAndLocation($conn) {
        $sql = "SELECT warehouse_id, full_location FROM warehouse";
        $result = $conn->query($sql);
        return $result;
    }

    function closeConn() {
        if ($this->conn != null) {
            $this->conn->close();
        }
    }
}
?>
