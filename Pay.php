<?php include("connection.php");?>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

$reservation_number = "RSV" . date( 'Ymsd' );
$customer_id = $_SESSION[ 'ID' ];
$customer_firstname = $_SESSION[ 'First_Name' ];
$customer_lastname = $_SESSION[ 'Last_Name' ];
$startdate = $_SESSION[ 'startDate' ];
$enddate = $_SESSION[ 'endDate' ];
$car_id = $_SESSION[ 'Car_ID' ];
$cars_name = $_SESSION[ 'Car_Name' ];
$totalprice = $_SESSION[ 'totalprice' ];
$card_holder = $_POST[ 'card_holder' ];
$card_number = $_POST[ 'card_number' ];
$card_expiry = $_POST[ 'expiry' ];
$cvv_cvc = $_POST[ 'cvv_cvc' ];
$quantity = 1;
$reservation_status = "PAID";

echo $reservation_number;
echo $customer_id;
echo $customer_firstname;
echo $customer_lastname;
echo $startdate;
echo $enddate;
echo $car_id;
echo $cars_name;
echo $totalprice;
echo $card_holder;
echo $card_number;
echo $card_expiry;
echo $cvv_cvc;


if ( $_POST ) {
  // var_dump($_POST);
  extract( $_POST );
  //$reservation_number = "RSV".date('Ymsd');
  $queryReserve = "INSERT INTO reservation(reservation_number, customer_id, customer_firstname, customer_lastname, cars_id, cars_name, date_from, date_end, quantity, reservation_status) 
		VALUES('$reservation_number','$customer_id','$customer_firstname','$customer_lastname', '$car_id','$cars_name','$startdate','$enddate', '$quantity', '$reservation_status')";
  // echo $queryReserve;
  // echo $queryPayment;
  if ( mysqli_query( $conn, $queryReserve ) ) {
    $reservation_id = mysqli_insert_id( $conn );
    $queryPayment = "INSERT INTO payment(reservationid,card_holder,card_number,expiry,cvv_cvc,total) 
				VALUES('$reservation_id','$card_holder','$card_number','$card_expiry','$cvv_cvc','$totalprice')";
    if ( mysqli_query( $conn, $queryPayment ) ) {
      header( "Location: Receipt.php?id=" . $reservation_id );
      //header("Location: Receipt.php");
      die();
    }
  }
}

?>
