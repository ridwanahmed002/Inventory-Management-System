<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../css/addemployee.css">
</head>
<body>
    <div class="container">
        <h1>Add New Employee</h1>
        <form action="../control/processaddemployee.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>

            <button type="submit" name="submit">Add Employee</button>
            <button type="button" onclick="window.location.href='employeeManagement.php';">Back</button>
        </form>
    </div>
</body>
</html>
