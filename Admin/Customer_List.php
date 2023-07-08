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

// Handle search form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['searchQuery'];

    // Prepare the SQL statement with a LIKE clause to search for matching first name, last name, phone number, or IC
    $sql = "SELECT * FROM user WHERE First_Name LIKE '%$searchQuery%' OR Last_Name LIKE '%$searchQuery%' OR `Phone Number` LIKE '%$searchQuery%' OR IC LIKE '%$searchQuery%'";
} else {
    // Default SQL statement to retrieve all users
    $sql = "SELECT * FROM user";
}

$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
    <style>
        p.solid {
            border-style: solid;
            text-align-last: center;
            width: 40%;
            background-color: blue;
            color: white;
            border-radius: 10px;
            font-size: 16px;
        }
    </style>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Booking</title>
</head>
<body>
    <form method="POST" style="margin-bottom: 20px;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by first name, last name, phone number, or IC" name="searchQuery">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <a href="Create_Customer.php" class="btn btn-success">Create New Customer</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">User ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Gender</th>
            <th scope="col">Password</th>
            <th scope="col">IC</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1; // Initialize a counter variable
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $counter++; ?></th> <!-- Increment and display the counter value -->
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['First_Name']; ?></td>
                <td><?php echo $row['Last_Name']; ?></td>
                <td><?php echo $row['Username']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td><?php echo $row['IC']; ?></td>
                <td><?php echo $row['Phone Number']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                    <a href="Modify_User.php?id=<?php echo $row['ID']; ?>" class="btn btn-primary">Modify</a>
                </td>
                <td>
                    <a href="Delete_User_Code.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
