<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
</head>

<body>
    <h2>Add Admin</h2>
    <form action="../control/processaddadmin.php" method="post">
        <div>
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname">
        </div>
        <div>
            <label for="pass">Password:</label><br>
            <input type="password" id="pass" name="pass">
        </div>
        <div>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email">
        </div>
        <div><input type="submit" value="Add Admin"></div>
    </form>
</body>

</html>