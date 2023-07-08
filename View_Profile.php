<?php include("connection.php"); ?>
<?php require('Header_User.php'); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Profile</h1>
    <form action="Update_Profile.php" method="POST">
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

        $sql = "SELECT * FROM user WHERE ID = $cus_id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" id="FirstName" name="FirstName" value="<?php echo $row['First_Name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" id="LastName" name="LastName" value="<?php echo $row['Last_Name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" id="Username" name="Username" value="<?php echo $row['Username'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Gender">Gender</label>
                <input type="text" id="Gender" name="Gender" value="<?php echo $row['Gender'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" id="Password" name="Password" value="<?php echo $row['Password'] ?>" required>
            </div>
            <div class="form-group">
                <label for="IC">IC</label>
                <input type="text" id="IC" name="IC" value="<?php echo $row['IC'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Phone">Phone Number</label>
                <input type="text" id="Phone" name="Phone" value="<?php echo $row['Phone Number'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" id="Email" name="Email" value="<?php echo $row['Email'] ?>" required>
            </div>
        <?php } ?>
        <div class="form-group">
            <input type="submit" class="btn" value="Update">
        </div>
    </form>
</div>
</body>
</html>
