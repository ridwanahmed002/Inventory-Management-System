
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Employeelist.php">Employee list<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <h1 class="text-center">Welcome to the Home Page</h1>
        <!-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">List of Registered Users</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr><th>USER ID</th>
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
                                            <a href='edit.php?user_id=" . $row["userId"] . "' class='btn btn-primary btn-sm'>Edit</a>
                                            <a href='delete.php?user_id=" . $row["user_id"] . "' class='btn btn-danger btn-sm'>Delete</a>
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
        </div> -->
    </div>
</body>
</html>


