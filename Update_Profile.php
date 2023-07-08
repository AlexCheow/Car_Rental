<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";
$cus_id = $_SESSION['ID'];
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['FirstName'];
	$last_name = $_POST['LastName'];
	$username =	$_POST['Username'];
	$gender=	$_POST['Gender'];
	$password =	$_POST['Password'];
	$ic=	$_POST['IC'];
	$phone=	$_POST['Phone'];
	$mail=	$_POST['Email'];
    // Retrieve other form fields' values

    $sql = "UPDATE user SET First_Name='$first_name', Last_Name = '$last_name', Username = '$username', Gender = '$gender', Password = '$password', IC = '$ic',  Email = '$mail' WHERE ID=$cus_id";
    // Update other fields using the corresponding SQL queries

    if ($conn->query($sql) === true) {
		echo header('location:Update_Profile_Success.php');
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>