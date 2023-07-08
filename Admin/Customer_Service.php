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
    $sql = "SELECT * FROM contact_us WHERE con_firstname LIKE '$searchQuery' OR con_lastname LIKE '%$searchQuery%' OR con_mail LIKE '%$searchQuery%' OR contact_message LIKE '%$searchQuery%'";
} else {
    // Default SQL statement to retrieve all reservations
    $sql = "SELECT * FROM contact_us";
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
    <title>Customer Services</title>
	    <script>
        function confirmStatus() {
            return confirm("Are you sure you want to change STATUS of this record?");
        }
    </script>
</head>
<body>
    <form method="POST" style="margin-bottom: 20px;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by first name, last name, phone number, or IC" name="searchQuery">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Status</th>
            <th scope="col">Done</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1; // Initialize a counter variable
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $counter++; ?></th> <!-- Increment and display the counter value -->
                <td><?php echo $row['con_cusid']; ?></td>
                <td><?php echo $row['con_firstname']; ?></td>
                <td><?php echo $row['con_lastname']; ?></td>
                <td><?php echo $row['con_mail']; ?></td>
                <td><?php echo $row['contact_message']; ?></td>
                <td><?php echo $row['con_status']; ?></td>
                <td>
                    <button><a href="Change_Status.php?id=<?php echo $row['con_cusid']; ?>" onclick="return confirmStatus();" class="btn btn-adanger">Solved</a></button>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
