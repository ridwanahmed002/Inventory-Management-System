<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove Admin</title>
    <link rel="stylesheet" href="../css/remove.css">
</head>
<body>
    <div class="container">
        <h1>Remove Admin</h1>
        <div class="form-group">
            <label for="adminId">Admin ID:</label>
            <input type="text" id="adminId" name="adminId">
        </div>
        <div class="button-group">
            <button type="button" onclick="removeAdmin()">Remove Admin</button>
            <a href="adminmanagement.php" class="back-button">Back</a>
        </div>
        <div id="message"></div>
    </div>
    <script src="../js/removeadmin.js"></script>
</body>
</html>
