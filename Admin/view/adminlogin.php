<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css">
</head>

<body>
    <center>
        <form name="adminLoginForm" action="../control/adminlogincheck.php" method="post"
            onsubmit="return validateAdminLogin()">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="uname"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </center>
    <script src="../js/adminLogin.js"></script>
</body>

</html>