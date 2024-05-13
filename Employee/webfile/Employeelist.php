<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            padding-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Welcome to the Home Page</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Registered Users</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Contact</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Database credentials
                            $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
                            $username = "root"; // Username for MySQL
                            $password = ""; // Password for MySQL, leave empty if no password is set
                            $dbname = "inventorymanagementdb"; // Name of your database

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // SQL query to fetch all users
                            $sql = "SELECT user_id, first_name, last_name, email, dob, mobile, gender FROM users";
                            $result = $conn->query($sql);

                            // Check if there are any users
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["user_id"] . "</td>";
                                    echo "<td>" . $row["first_name"] . "</td>";
                                    echo "<td>" . $row["last_name"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["dob"] . "</td>";
                                    echo "<td>" . $row["mobile"] . "</td>";
                                    echo "<td>" . $row["gender"] . "</td>";
                                    echo "<td>
                                            <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editUserModal' onclick=\"populateEditUserModal('" . $row['user_id'] . "', '" . $row['first_name'] . "', '" . $row['last_name'] . "', '" . $row['email'] . "', '" . $row['dob'] . "', '" . $row['mobile'] . "', '" . $row['gender'] . "')\">Edit</button>
                                            <a href='delete.php?user_id=" . $row["user_id"] . "' class='btn btn-danger btn-sm delete-btn'>Delete</a>

                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No users found</td></tr>";
                            }

                            // Close connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Edit User Form -->
                <form id="editUserForm">
                    <!-- User information fields here -->
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Contact:</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUserChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<script>

    

// Function to populate edit user modal with user data
function populateEditUserModal(userId, firstName, lastName, email, dob, mobile, gender) {
    document.getElementById('user_id').value = userId;
    document.getElementById('first_name').value = firstName;
    document.getElementById('last_name').value = lastName;
    document.getElementById('email').value = email;
    document.getElementById('dob').value = dob;
    document.getElementById('mobile').value = mobile;
    document.getElementById('gender').value = gender;
}

// Function to save user changes
// function saveUserChanges() {
//     alert('Function executed');
//     console.log('data');
//     // Get form data
//     var userId = document.getElementById('user_id').value;
//     var firstName = document.getElementById('first_name').value;
//     var lastName = document.getElementById('last_name').value;
//     var email = document.getElementById('email').value;
//     var dob = document.getElementById('dob').value;
//     var mobile = document.getElementById('mobile').value;
//     var gender = document.getElementById('gender').value;

//     // Perform validation if needed

//     // AJAX call to update user information
//     $.ajax({
        
//         url: '',
//         method: 'POST',
//         data: {
//             userId: userId,
//             firstName: firstName,
//             lastName: lastName,
//             email: email,
//             dob: dob,
//             mobile: mobile,
//             gender: gender
//         },
//         success: function(response) {
//             // Handle success response
//             console.log(response);
//             // Reload the page or update UI as needed
//             window.location.reload();
//         },
//         error: function(xhr, status, error) {
//             // Handle error
//             console.error(error);
//             // Display error message or take appropriate action
//         }
//     });
// }
</script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Include custom JavaScript -->
    <script src="script.js"></script>
</body>
</html>
