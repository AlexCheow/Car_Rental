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
    $sql = "SELECT * FROM reservation WHERE reservation_id LIKE '$searchQuery' OR customer_firstname LIKE '%$searchQuery%' OR customer_lastname LIKE '%$searchQuery%'";
} else {
    // Default SQL statement to retrieve all reservations
    $sql = "SELECT * FROM reservation";
}

$result = $conn->query($sql);

// Handle delete reservation
/*if (isset($_GET['id'])) {
    $reservationId = $_GET['id'];

    // Prepare the SQL statement to delete the reservation
    $deleteSql = "DELETE FROM reservation WHERE reservation_id = '$reservationId'";

    if ($conn->query($deleteSql) === TRUE) {
        // Redirect back to this page after successful deletion
        header("Location: Check-In_Code.php");
        exit();
    } else {
        echo "Error deleting reservation: " . $conn->error;
    }
}*/
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
    <script>
        function confirmCheckIn() {
            return confirm("Are you sure you want to check in?");
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
            <th scope="col">Reservation ID</th>
            <th scope="col">Reservation No</th>
            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Car Booking</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Check-In</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1; // Initialize a counter variable
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $counter++; ?></th> <!-- Increment and display the counter value -->
                <td><?php echo $row['reservation_id']; ?></td>
                <td><?php echo $row['reservation_number']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['customer_firstname']; ?></td>
                <td><?php echo $row['customer_lastname']; ?></td>
                <td><?php echo $row['cars_name']; ?></td>
                <td><?php echo $row['date_from']; ?></td>
                <td><?php echo $row['date_end']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['reservation_status']; ?></td>
                <td>
                    <a href="Check-In_Code.php?id=<?php echo $row['reservation_id']; ?>" onclick="return confirmCheckIn();" class="btn btn-adanger">Check-In</a>
                </td>
            </tr>
            <?php
			
        }
        ?>
        </tbody>
    </table>
</body>
</html>
