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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $reservation_id = $_GET['id'];

    // Prepare the SQL statement to delete the user with the specified ID
    $sql = "DELETE FROM reservation WHERE reservation_id = '$reservation_id'";

    if ($conn->query($sql) === TRUE) {
        // User deleted successfully, redirect to the view page
        header("Location: Admin_View_Booking.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>
