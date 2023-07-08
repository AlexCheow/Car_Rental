<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the form data
    $galleryName = $_POST['gallery_name'];
    $galleryTitle = $_POST['gallery_title'];
    $galleryLink = $_POST['gallery_link'];

    // Check if all required fields are filled
    if (empty($galleryName) || empty($galleryTitle) || empty($galleryLink)) {
        echo "Please fill all the required fields.";
        exit;
    }

    // Process the uploaded image
    $targetDirectory = "gallery_images/";
    $targetFile = $targetDirectory . basename($_FILES['gallery_image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a valid image
    $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $validExtensions)) {
        echo "Invalid image format. Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    // Move the uploaded image to the target directory
    if (move_uploaded_file($_FILES['gallery_image']['tmp_name'], $targetFile)) {
        // Image upload success, now save gallery details in the database
        $stmt = $conn->prepare("INSERT INTO gallery (gallery_name, gallery_img, gallery_title, gallery_link) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $galleryName, $targetFile, $galleryTitle, $galleryLink);

        if ($stmt->execute()) {
            echo "New gallery added successfully.";
        } else {
            echo "Error adding gallery: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}

?>