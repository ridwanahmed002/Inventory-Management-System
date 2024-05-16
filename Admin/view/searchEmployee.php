<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Employee</title>
    <link rel="stylesheet" href="../css/searchEmployee.css">
</head>
<body>
    <div class="container">
        <h1>Search Employee by Contact</h1>
        <form action="../control/processsearchEmployee.php" method="get">
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
        <button type="submit">Search</button>
        </form>
    </div>
</body>
</html>
