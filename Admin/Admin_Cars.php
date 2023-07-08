<?php
require('Admin_Header.php');
?>
<?php include_once('Link.php'); ?>
<?php include("connection.php"); ?>
<!doctype html>
<html>
<?php
session_start();

/*echo $_SESSION[ 'Username' ];
echo $_SESSION[ 'First_Name' ];
echo $_SESSION[ 'Last_Name' ];*/

?>
<head>
<title>Home</title>
<style type="text/css">
.card img {
    width: 398px;
    height: 256px;
    object-fit: cover;
}
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/Booking.css" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script> 
<!--Custom styles--> 
<!--<link rel="stylesheet" type="text/css" href="css/User_Home_Nav.css">-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="container">
  <div class="row my-4">
    <div class="col">
      <div class="container-fluid">
        <div class="row">

        </div>
        
        <div class="row">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "car_rental";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM cars";

            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-md-4 d-flex mb-4">
                <div class="card flex-fill">
                  <?php echo '<img src="data:image;base64,' . base64_encode($row['Images']) . '">'; ?>
                  <div class="card-body flex-column d-flex">
                    <h5 class="card-title"><?php echo $row['Name'] ?></h5>
                    <p class="card-text"><?php echo $row['Description'] ?></p>
                    <div class="mt-auto">
                      <span>Size: <?php echo $row['Size'] ?></span><br>
                      <span>Price: RM <?php echo $row['Price'] ?>/Day</span>
                    </div>
                    <div class="mt-auto">
                      <button type="button" class="btn btn-secondary mt-auto m-2 float-end" onclick="modifyCar(<?php echo $row['car_id']; ?>)">Modify</button>
                      <button type="button" class="btn btn-danger mt-auto m-2 float-end" onclick="deleteCar(<?php echo $row['car_id']; ?>)">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Add Car Form -->
  <div class="row">
    <div class="col">
      <div class="container-fluid">
        <h3>Add a New Car</h3>
        <form action="Add_Cars.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input type="text" class="form-control" id="size" name="size" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
          </div>
			<div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          </div>
			<div class="mb-3">
            <label for="imagelink" class="form-label">Image Link (From Internet)</label>
            <input type="text" class="form-control" id="imagelink" name="imagelink"  required>
          </div>
          <button type="submit" class="btn btn-primary">Add Car</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modify Car -->
<script>
  function modifyCar(carId) {
    window.location.href = "Modify_Cars.php?carId=" + carId;
  }
</script>

<!-- Delete Car -->
<script>
  function deleteCar(carId) {
    var result = confirm("Are you sure you want to delete this car?");
    if (result) {
      window.location.href = "Delete_Car.php?carId=" + carId;
    }
  }
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js" integrity="sha384-H78kt3EEXJubXTclzWj8zByM9XWACweFkgE5cFgqJd+rDq6tj1AsfpxWWxQa5S3i" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjA9gEVnhKEvmJS5y2t6J2aaq4fqYbwb3cJybIIqkkh9/Q6FZ1gOxIxpG8E6F0D" crossorigin="anonymous"></script>
</body>

</html>
