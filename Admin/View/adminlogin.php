<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <center>
        <h2>Admin Login</h2>
        <form action="../Control/adminlogincheck.php" method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="pass" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </center>
</body>

</html>