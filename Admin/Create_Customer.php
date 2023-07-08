<?php
require('Admin_Header.php');
?>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $ic = $_POST['ic'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    // Prepare the SQL statement to insert a new customer record
    $sql = "INSERT INTO user (First_Name, Last_Name, Username, Gender, Password, IC, `Phone Number`, Email) 
            VALUES ('$firstName', '$lastName', '$username', '$gender', '$password', '$ic', '$phoneNumber', '$email')";

    if ($conn->query($sql) === true) {
        // Customer record created successfully
        echo "<div class='alert alert-success'>Customer created successfully!</div>";
    } else {
        // Error creating customer record
        echo "<div class='alert alert-danger'>Error creating customer: " . $conn->error . "</div>";
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Customer</title>
</head>
<body>
    <div class="container">
        <h1>Create New Customer</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="ic" class="form-label">IC</label>
                <input type="text" class="form-control" id="ic" name="ic" required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
