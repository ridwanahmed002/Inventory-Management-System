<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: auto;
            margin: 0 auto;
            padding: auto;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Registration Form</h5>
                <form action="process.php" method="POST">
                    <!-- Add a hidden input field for indicating form submission purpose -->
                    <input type="hidden" name="signup" value="1">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first">First Name:</label>
                            <input type="text" id="first" name="first" class="form-control" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last">Last Name:</label>
                            <input type="text" id="last" name="last" class="form-control" placeholder="Enter your last name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                        <label for="repassword">Re-type Password:</label>
                        <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Re-enter your password" required>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Contact:</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Include necessary JavaScript -->

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
