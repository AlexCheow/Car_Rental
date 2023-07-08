<?php include("connection.php");?>
<?php
session_start();
	if($_POST){
		// var_dump($_POST);
		extract($_POST);
	}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Payment System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/payment.css"></link>
	<link rel="stylesheet" href="css/Payment_System_CSS.css"></link>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style>
		.zoom:hover
		{
  -ms-transform: scale(1.2); /* IE 9 */
  -webkit-transform: scale(1.2); /* Safari 3-8 */
  transform: scale(1.2); 
		}
	</style>
</head>

<body>
	<div class="container p-0">
		<form class="contact-form row" method="post" action="Pay.php">
			<!--<input name="room_id" type="hidden" value="<?php //echo $room_id?>">
			<input name="total" type="hidden" value="<?php //echo $price?>">
			<input name="name" type="hidden" value="<?php //echo $name?>">
			<input name="email" type="hidden" value="<?php //echo $email?>">
			<input name="gender" type="hidden" value="<?php //echo $gender?>">
			<input name="nationality" type="hidden" value="<?php //echo $nationality?>">
			<input name="country" type="hidden" value="<?php //echo $country?>">
			<input name="date_to" type="hidden" value="<?php //echo $date_to?>">
			<input name="date_from" type="hidden" value="<?php //echo $date_from?>">-->
			<div class="card px-4">
				<p class="h8 py-3">Payment Details</p>
				<div class="row gx-3">
					<div class="col-12">
						<div class="d-flex flex-column">
							<p class="text mb-1">Person Name</p><input name = "card_holder" class="form-control mb-3" type="text" placeholder="Card Holder Name" required>
						</div>
					</div>
					<div class="col-12">
						<div class="d-flex flex-column">
							<p class="text mb-1">Card Number</p> <input name = "card_number" class="form-control mb-3" type="text" placeholder="1234 5678 435678" required>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex flex-column">
							<p class="text mb-1">Expiry</p> <input name = "expiry" class="form-control mb-3" type="text" placeholder="MM/YYYY" required>
						</div>
					</div>
					<div class="col-6">
						<div class="d-flex flex-column">
							<p class="text mb-1">CVV/CVC</p> <input name = "cvv_cvc" class="form-control mb-3 pt-2 " type="password" placeholder="***" required>
						</div>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary mb-3 zoom"> <span class="ps-3" >Pay - RM <?php echo $_SESSION['totalprice']; ?> </span> <span class="fas fa-arrow-right"></span> </button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>