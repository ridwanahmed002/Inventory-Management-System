<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/slideshow.js"></script>
</head>

<body>
    <center>
        <form action="../control/adminlogincheck.php" method="post">
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
        <div class="slideshow-container">
            <div class="slideshow">
                <!-- Texts will be loaded here dynamically -->
            </div>
        </div>
    </center>
</body>

</html>
