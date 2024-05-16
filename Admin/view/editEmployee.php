<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
<?php
include '../model/db.php';
$db = new db();
$conn = $db->openConn();

$employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : 0;
$employee = $db->getEmployeeById($conn, $employee_id);

if ($employee) {
    // Extract all fields as variables
    $fname = $employee['fname'];
    $lname = $employee['lname'];
    $age = $employee['age'];
    $gender = $employee['gender'];
    $email = $employee['email'];
    $contact = $employee['contact'];
    $address = $employee['address'];
    $section = $employee['section'];
} else {
    echo "Employee not found.";
    return; // Stop further execution if no employee is found
}
?>
    <h1>Edit Employee</h1>
    <form method="POST" action="../control/processeditEmployee.php">
        <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
        <label>First Name:<input type="text" name="fname" value="<?php echo $fname; ?>"></label><br>
        <label>Last Name:<input type="text" name="lname" value="<?php echo $lname; ?>"></label><br>
        <label>Age:<input type="number" name="age" value="<?php echo $age; ?>"></label><br>
        <label>Gender:
            <select name="gender">
                <option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
                <option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
            </select>
        </label><br>
        <label>Email:<input type="email" name="email" value="<?php echo $email; ?>"></label><br>
        <label>Contact:<input type="text" name="contact" value="<?php echo $contact; ?>"></label><br>
        <label>Address:<input type="text" name="address" value="<?php echo $address; ?>"></label><br>
        <label>Section:<input type="text" name="section" value="<?php echo $section; ?>"></label><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
