<?php
include '../control/adminlogincheck.php'; // Include the login control, make sure this path is correct as per your structure
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css"> <!-- Link to the CSS file, assuming correct path -->
</head>
<body>
    <form method="POST" action="">
        Username: <input type="text" name="uname" />
        Password: <input type="password" name="pass" />
        <input type="submit" name="submit" value="Login" />
    </form>
</body>
</html>
