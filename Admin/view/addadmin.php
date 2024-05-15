<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../css/addadmin.css"> 
</head>
<body>
    <div class="container">
        <h1>Add New Admin</h1>
        <form id="addAdminForm" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <div id="usernameError" class="form-error"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <div id="emailError" class="form-error"></div>
            </div>
            <button type="submit">Add Admin</button>
        </form>
        <a href="adminmanagement.php" class="back-button">Back</a>
    </div>
    <script src="../js/addadmin.js"></script>
</body>
</html>
