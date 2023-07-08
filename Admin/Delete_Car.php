<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['Username'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the carId parameter is present in the URL
    if (isset($_GET['carId'])) {
        $carId = $_GET['carId'];

        // Delete the car from the database
        $sql = "DELETE FROM cars WHERE car_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $carId);

        if ($stmt->execute()) {
            // Car deleted successfully
            echo '<script>alert("Car Deleted Successfully!");</script>';
            header("Location: Admin_Cars.php");
            exit();
        } else {
            // Error occurred while deleting car
            echo '<script>alert("Error deleting car: ' . $stmt->error . '");</script>';
            header("Location: Admin_Cars.php");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        // carId parameter not found
        header("Location: Admin_Cars.php");
        exit();
    }
} else {
    // Invalid request method
    header("Location: Admin_Cars.php");
    exit();
}
?>
