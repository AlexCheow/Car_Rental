<?php include_once('Link.php' )?>
<?php include("connection.php");?>
<link rel="stylesheet" href="css/Reservation_Form_Design.css">
<?php
session_start();
if($_POST){
		extract($_POST);
	}

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

$sql = "SELECT * FROM user WHERE ID = '$userid'";
$result = $conn->query($sql);
	  while($row = $result->fetch_assoc()){
		  
		  
	  

?>


<div class="container">
	<form class="contact-form row" method="POST" action="Payment_System.php">
	<div class="form">
  <div class="row">
    <div class="col">
	<label for="" class="form-label">FIRST NAME</label>
	<input type="text" class="form-control" id="firstname" value="<?php echo $row['First_Name'];?>" disabled>
    </div>
    <div class="col">
    <label for="" class="form-label">LAST NAME</label>
	<input type="text" class="form-control" id="lastname" value="<?php echo $row['Last_Name'];?>" disabled>
    </div>
  </div>
	
	<div class="row">
	<div class="col">
	<label for="" class="form-label">PHONE NUMBER</label>
	<input type="text" class="form-control" id="phonenum" value="<?php echo $row['Phone Number'];?>" disabled>
	</div>
	<div class="col">
	<label for="" class="form-label">E-MAIL</label>
	<input type="text" class="form-control" id="email" value="<?php echo $row['Email'];?>" disabled>
	</div>
	</div>
		
	<div class="row">
	<div class="col">
	<label for="" class="form-label">CAR RENTAL</label>
    <input type="text" class="form-control" id="car_choose" value="<?php echo $car_name;?>" disabled>
	</div>
	<div class="col">
	<label for="" class="form-label">DATE FROM</label>
    <input type="text" class="form-control" id="datefrom" value="<?php echo $_SESSION['startDate'];?>" disabled>
	</div>
	<div class="col">
	<label for="" class="form-label">DATE TO</label>
    <input type="text" class="form-control" id="dateto" value="<?php echo $_SESSION['endDate'];?>" disabled>
	</div>
	</div>
		
	<div class="row">
	<div class="col">
	<label for="" class="form-label">TOTAL PRICE</label>
    <input type="text" class="form-control" id="car_choose" value="<?php echo $_SESSION['totalprice'];?>" disabled>
	</div>
	</div>
		
	<div class="row">
	<div class="col">
	<button class="submit-btn " type="submit"/>Book</button>
	</div>
	</form>
	</div>
		<?php
		  }
$_SESSION[ 'Car_ID' ] = $car_id;
$_SESSION[ 'Car_Name' ] = $car_name;
//$_SESSION[ 'Email' ] = $row['Email'];
?>
	</div>
</div>

