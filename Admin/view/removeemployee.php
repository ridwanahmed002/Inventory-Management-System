<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Employee</title>
    <link rel="stylesheet" href="../css/remove.css">
</head>
<body>
    <div class="container">
        <h1>Delete Employee</h1>
        <div class="form-group">
            <label for="employeeId">Employee ID:</label>
            <input type="text" id="employeeId" name="employeeId">
        </div>
        <div class="button-group">
            <button type="button" onclick="removeEmployee()">Delete Employee</button>
            <a href="employeemanagement.php" class="back-button">Back</a>
        </div>
        <div id="message"></div>
    </div>
    <script src="../js/removeemployee.js"></script>
</body>
</html>
