<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/create_account.css">
    <script src="../js/create_account.js"></script>
</head>
<body>
    <div class="login-container">
        <h2>Create Account</h2>
        <?php
        include('../model/db.php');
        $message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $location = $_POST['location'];

            if (empty($username) || empty($password) || empty($email) || empty($phone) || empty($gender) || empty($age) || empty($location)) {
                $message = "All fields are required.";
            } else {
                if ($db->isUsernameTaken($username)) {
                    $message = "Username is already taken.";
                } else {
                    if ($db->createCustomer($username, $password, $email, $phone, $gender, $age, $location)) {
                        $message = "Account created successfully.";
                    } else {
                        $message = "Error: " . $db->conn->error;
                    }
                }
            }
        }
        ?>
        <form action="" method="post" onsubmit="return validateCreateAccountForm()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>"><br>
            <span id="usernameError"><?php echo $message === "Username is already taken." ? $message : ''; ?></span><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>
            <span id="passwordError"></span><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"><br>
            <span id="emailError"></span><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>"><br>
            <span id="phoneError"></span><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="Male" <?php echo (isset($gender) && $gender === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo (isset($gender) && $gender === 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo (isset($gender) && $gender === 'Other') ? 'selected' : ''; ?>>Other</option>
            </select><br>
            <span id="genderError"></span><br>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="<?php echo isset($age) ? $age : ''; ?>"><br>
            <span id="ageError"></span><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo isset($location) ? $location : ''; ?>"><br>
            <span id="locationError"></span><br>

            <input type="submit" value="Create Account">
        </form>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
