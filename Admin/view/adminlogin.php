<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../css/adminlogin.css">
    <script type="text/javascript" src="../js/adminlogin.js"></script>
</head>

<body>

    <div class="admin-login-form">
        <h2>Admin Login</h2>
        <form name="adminLoginForm" action="../control/adminlogincheck.php" method="post"
            onsubmit="return validateAdminLoginForm()">
            Username: <input type="text" id="username" name="username"><br>
            Password: <input type="password" id="password" name="password"><br>
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </form>
    </div>

</body>

</html>