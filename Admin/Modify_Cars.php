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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carId = $_POST['carId'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image'];
    $imageLink = $_POST['imagelink'];

    // Update the car in the database
    if (!empty($image['tmp_name'])) {
        // Process and save the uploaded image
        $imageData = file_get_contents($image['tmp_name']);
        $imageType = $image['type'];
        $imageData = base64_encode($imageData);
        $sql = "UPDATE cars SET Name = ?, Description = ?, Size = ?, Price = ?, Number = ?, Images = NULL, Image_Link = NULL WHERE car_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $description, $size, $price, $quantity, $carId);
    } elseif (!empty($imageLink)) {
        // Use the provided image link
        $sql = "UPDATE cars SET Name = ?, Description = ?, Size = ?, Price = ?, Number = ?, Images = NULL, ImageLink = ? WHERE car_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $description, $size, $price, $quantity, $imageLink, $carId);
    } else {
        // Keep the existing image data and link
        $sql = "UPDATE cars SET Name = ?, Description = ?, Size = ?, Price = ?, Number = ? WHERE car_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $name, $description, $size, $price, $quantity, $carId);
    }

    if ($stmt->execute()) {
        // Car updated successfully
        echo '<script>alert("Car Updated Successfully!");</script>';
        header("Location: Admin_Cars.php");
        exit();
    } else {
        // Error occurred while updating car
        $error = "Error updating car: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Check if the carId parameter is present in the URL
    if (isset($_GET['carId'])) {
        $carId = $_GET['carId'];

        // Retrieve the car details from the database
        $sql = "SELECT * FROM cars WHERE car_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $carId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Fetch the car details
            $row = $result->fetch_assoc();
            $name = $row['Name'];
            $description = $row['Description'];
            $size = $row['Size'];
            $price = $row['Price'];
            $quantity = $row['Number'];
            $imageData = $row['Images'];
            $imageLink = $row['Image_Link'];

            $stmt->close();
        } else {
            // Car not found
            $stmt->close();
            $conn->close();
            header("Location: Admin_Cars.php");
            exit();
        }
    } else {
        // carId parameter not found
        header("Location: Admin_Cars.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modify Cars</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Modify Car</h1>
        <form action="Modify_Cars.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="carId" value="<?php echo $carId; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>

                <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" id="size" name="size" value="<?php echo $size; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" min="0" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="0" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="imagelink">Image Link (From Internet):</label>
                <input type="text" class="form-control" id="imagelink" name="imagelink">
            </div>
            <button type="submit" class="btn">Update</button>
            <a href="Admin_Cars.php" class="btn cancel">Cancel</a>
            <p class="error"><?php echo $error; ?></p>
        </form>
    </div>
</body>
</html>
