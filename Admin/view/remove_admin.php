<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Admin</title>
    <link rel="stylesheet" href="../css/remove_admin.css">
</head>

<body>
    <div class="admin-management">
        <h1>Remove Admin</h1>
        <form id="removeAdminForm" action="../control/processremove_admin.php" method="post"
            onsubmit="return validateAdminRemoval()">
            <input type="text" id="username" name="username" placeholder="Enter Admin Username">
            <div id="usernameError" class="error"></div>
            <button type="submit" id="proceed">Proceed</button>
            <button type="reset" id="reset">Reset</button>
            <button type="button" id="return" onclick="window.location='./adminmanagement.php';">Return</button>
        </form>
    </div>
    <script src="../js/remove_admin.js"></script>
</body>

</html>