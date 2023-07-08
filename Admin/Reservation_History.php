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
    $sql = "SELECT * FROM check_out WHERE reserv_id LIKE '$searchQuery' OR reserv_num LIKE '%$searchQuery%' OR cust_firname LIKE '%$searchQuery%' OR cust_lasname LIKE '%$searchQuery%' OR date_start LIKE '%$searchQuery%'OR date_to LIKE '%$searchQuery%' OR check_indate LIKE '%$searchQuery%' OR check_outdate LIKE '%$searchQuery%'";
} else {
    // Default SQL statement to retrieve all reservations
    $sql = "SELECT * FROM check_out";
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
        function confirmCheckOut() {
            return confirm("Are you sure you want to check out?");
        }
    </script>
</head>
<body>
    <form method="POST" style="margin-bottom: 20px;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="searchQuery">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
			<th scope="col">Check-Out ID</th>
			<th scope="col">Check-In ID</th>
            <th scope="col">Reservation ID</th>
            <th scope="col">Reservation No</th>
            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
			<th scope="col">Car ID</th>
            <th scope="col">Car Booking</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Quantity</th>
            <th scope="col">Check-In</th>
			<th scope="col">Check-Out</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 1; // Initialize a counter variable
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $counter++; ?></th> <!-- Increment and display the counter value -->
				<td><?php echo $row['checkout_id']; ?></td>
				<td><?php echo $row['checkin_id']; ?></td>
                <td><?php echo $row['reserv_id']; ?></td>
                <td><?php echo $row['reserv_num']; ?></td>
                <td><?php echo $row['cust_id']; ?></td>
                <td><?php echo $row['cust_firname']; ?></td>
                <td><?php echo $row['cust_lasname']; ?></td>
                <td><?php echo $row['idcar']; ?></td>
				<td><?php echo $row['namecar']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['check_indate']; ?></td>
				<td><?php echo $row['check_outdate']; ?></td>
            </tr>
            <?php
			
        }
        ?>
        </tbody>
    </table>
</body>
</html>
