<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['Username'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

require('Admin_Header.php');
require('Link.php');
require('connection.php');

$error = '';

// Establish a database connection
$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['tmp_name'];
    $imagelink = $_POST['imagelink'];

    // Read the image file
    $imageData = file_get_contents($image);

    // Create a new car in the database
    $sql = "INSERT INTO cars (Name, Description, Size, Price, Number, Images, Image_Link) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $description, $size, $price, $quantity, $imageData, $imagelink);

    if ($stmt->execute()) {
        // Car added successfully
        echo '<script>alert("Car Added Successfully!");</script>';
        header("Location: Admin_Cars.php");
        exit();
    } else {
        // Error occurred while adding car
        $error = "Error adding car: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
