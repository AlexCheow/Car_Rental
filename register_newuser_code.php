<?php
include_once('Link.php');
?>
<?php
include_once('connection.php');
?>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO user (First_Name, Last_Name, Username, Gender, Password, IC, `Phone Number`, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ssssssss", $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['gender'], $_POST['password'], $_POST['ic'], $_POST['phone_number'], $_POST['email']);

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM user WHERE Username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $_POST['username']);
    $checkUsernameStmt->execute();
    $checkUsernameResult = $checkUsernameStmt->get_result();
    if ($checkUsernameResult->num_rows > 0) {
        echo '<script>alert("USERNAME ALREADY EXISTS!");</script>';
        $checkUsernameStmt->close();
        $conn->close();
		
        die();
    }
    $checkUsernameStmt->close();

    // Check if the phone number already exists
    $checkPhoneNumberQuery = "SELECT * FROM user WHERE `Phone Number` = ?";
    $checkPhoneNumberStmt = $conn->prepare($checkPhoneNumberQuery);
    $checkPhoneNumberStmt->bind_param("s", $_POST['phone_number']);
    $checkPhoneNumberStmt->execute();
    $checkPhoneNumberResult = $checkPhoneNumberStmt->get_result();
    if ($checkPhoneNumberResult->num_rows > 0) {
        echo '<script>alert("PHONE NUMBER ALREADY EXISTS!");</script>';
        $checkPhoneNumberStmt->close();
        $conn->close();
		
        die();
    }
    $checkPhoneNumberStmt->close();

    // Check if the IC already exists
    $checkICQuery = "SELECT * FROM user WHERE IC = ?";
    $checkICStmt = $conn->prepare($checkICQuery);
    $checkICStmt->bind_param("s", $_POST['ic']);
    $checkICStmt->execute();
    $checkICResult = $checkICStmt->get_result();
    if ($checkICResult->num_rows > 0) {
        echo '<script>alert("IC ALREADY EXISTS!");</script>';
        $checkICStmt->close();
        $conn->close();
		
        die();
    }
    $checkICStmt->close();

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM user WHERE Email = ?";
    $checkEmailStmt = $conn->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $_POST['email']);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();
    if ($checkEmailResult->num_rows > 0) {
        echo '<script>alert("EMAIL ALREADY EXISTS!");</script>';
        $checkEmailStmt->close();
        $conn->close();
		
        die();
    }
    $checkEmailStmt->close();

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful!");</script>';
        header("Location: registration_success.php");
        die();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
?>
