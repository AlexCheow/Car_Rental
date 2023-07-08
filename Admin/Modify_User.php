<?php
require('Admin_Header.php');

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

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database based on the user ID
    $sql = "SELECT * FROM user WHERE ID = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid user ID.";
    exit;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $ic = $_POST['ic'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Update the user record in the database
    $update_sql = "UPDATE user SET First_Name = '$first_name', Last_Name = '$last_name', Username = '$username', Gender = '$gender', Password = '$password', IC = '$ic', `Phone Number` = '$phone_number', Email = '$email' WHERE ID = '$user_id'";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect back to the user listing page
        header("Location: Customer_List.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
        exit;
    }
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modify User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Modify User</h2>
        <div class="form-container">
            <form method="POST">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['First_Name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['Last_Name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['Username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Male" <?php if ($row['Gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($row['Gender'] === 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['Password']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="ic" class="form-label">IC</label>
                    <input type="text" class="form-control" id="ic" name="ic" value="<?php echo $row['IC']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $row['Phone Number']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
