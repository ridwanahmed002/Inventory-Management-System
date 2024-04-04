<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
    <link rel="stylesheet" href="../css/addadmin.css">
</head>

<body>
    <div class="form-container">
        <?php
            if (isset($_SESSION['add_admin_success'])) {
                echo "<p class='success-message'>" . $_SESSION['add_admin_success'] . "</p>";
                unset($_SESSION['add_admin_success']);
            }
        ?>
        <form id="addAdminForm" action="../control/processaddadmin.php" method="post">
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="uname" required>
            <span id="unameError" class="error-message"></span>

            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span id="emailError" class="error-message"></span>

            <input type="submit" value="Proceed">
            <input type="reset" value="Reset">
            <button type="button" onclick="window.location.href='adminmanagement.php'">Back</button>
        </form>
    </div>
    <script src="../js/addadmin.js"></script>
</body>

</html>