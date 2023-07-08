<?php include("connection.php");?>
<?php
require( 'Header_User.php' )
?>
<!doctype html>
<html>
<head>
	<style>
		p.solid {
    border-style: solid;
    text-align-last: center;
    width: 40%;
    background-color: blue;
    color: white;
    border-radius: 10px;
    font-size: 16px;
}
	</style>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Customer List</title>
</head>
<body>
	<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Reservation No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
		<th scope="col">Car Reserved</th>
		<th scope="col">From</th>
		<th scope="col">To</th>
		<th scope="col">Status</th>
		<th scope="col">Receipt</th>
    </tr>
  </thead>
  <tbody>
    <?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";
    $cus_id = $_SESSION[ 'ID' ];

    $conn = new mysqli( $servername, $username, $password, $dbname );
    // Check connection
    if ( $conn->connect_error ) {
      die( "Connection failed: " . $conn->connect_error );
    }

    $sql = "SELECT * FROM reservation WHERE customer_id = $cus_id";
    //$result = $conn->query($sql);
$counter = 1;
    $result = $conn->query( $sql );
    while ( $row = $result->fetch_assoc() ) {
      ?>
    <tr>
      <th scope="row"><?php echo $counter++; ?></th>
      <td><?php echo $row['reservation_number']; ?></td>
      <td><?php echo $row['customer_firstname']; ?></td>
      <td><?php echo $row['customer_lastname']; ?></td>
		<td><?php echo $row['cars_name']; ?></td>
		<td><?php echo $row['date_from']; ?></td>
		<td><?php echo $row['date_end']; ?></td>
		<td><p class="solid"><?php echo $row['reservation_status']; ?></div></td>
		<td><button onClick="location.href='Receipt.php?id=<?php echo $row['reservation_id']; ?>'">View Receipt</button></td>

    </tr>
  </tbody>
  <?php
  }
  ?>
</table>
	</div>
</body>
</html>

