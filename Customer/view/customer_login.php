<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="../css/customer_login.css">
    <script src="../js/customer_login.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Customer Login</h2>
        <form action="../control/customer_login.process.php" method="post" onsubmit="return validateLoginForm()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br>
            <span id="usernameError"></span><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>
            <span id="passwordError"></span><br>

            <input type="submit" value="Login">
        </form>
        <button class="create-account-button" onclick="window.location.href='create_account.php'">Create Account</button>
    </div>
</body>
</html>
