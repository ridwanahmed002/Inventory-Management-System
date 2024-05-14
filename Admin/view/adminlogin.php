<?php
include '../control/adminlogincheck.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/adminLogin.css">
</head>
<body>
    <form method="POST" action="">
        Username: <input type="text" name="uname" />
        Password: <input type="password" name="pass" />
        <input type="submit" name="submit" value="Login" />
    </form>
</body>
</html>
