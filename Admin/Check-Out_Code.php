<?php
require('Admin_Header.php');
?>

<?php
include_once('Link.php');
?>

<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current date and time
    $checkOutDate = date('Y-m-d H:i:s');

    $sql = "INSERT INTO check_out (checkin_id, reserv_id, reserv_num, cust_id, cust_firname, cust_lasname, idcar, namecar, start_date, end_date, quantity, check_indate, check_outdate)
        SELECT checkin_id, reservation_id, reservation_num, customerid, customer_firname, customer_lasname, carid, carname, date_start, date_to, quantity, checkin_date, '$checkOutDate' AS check_outdate
        FROM check_in WHERE checkin_id = $id";

    if ($conn->query($sql) === TRUE) {
        // Delete the record from the reservation table
        $deleteSql = "DELETE FROM check_in WHERE checkin_id = $id";
        if ($conn->query($deleteSql) === TRUE) {
            // Redirect back to this page after successful deletion
            header("Location: Check-Out.php");
            exit();
        } else {
            echo "Error deleting reservation: " . $conn->error;
        }
    } else {
        echo "Error inserting check-in record: " . $conn->error;
    }

    $conn->close();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Check-In</title>
</head>

<body>
</body>
</html>
