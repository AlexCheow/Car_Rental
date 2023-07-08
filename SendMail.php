<?php include("connection.php");?>
<?php
session_start();
if ( $_POST ) {
  // var_dump($_POST);
  extract( $_POST );
}
$customer_id = $_POST[ 'Cus_ID' ];
$customer_firstname = $_POST[ 'FirstName' ];
$customer_lastname = $_POST[ 'LastName' ];
$customer_mail = $_POST[ 'Mail' ];
$contact_message = $_POST[ 'Message' ];
echo $customer_firstname;
echo $customer_lastname;
echo $customer_mail;
echo $contact_message;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ( $conn->connect_error ) {
  die( "Connection failed: " . $conn->connect_error );
}

$sql = "INSERT INTO contact_us (con_id, con_cusid, con_firstname, con_lastname, con_mail, contact_message, con_status) VALUES (NULL, '$customer_id','$customer_firstname','$customer_lastname','$customer_mail','$contact_message','PENDING') ";

$result = mysqli_query($conn,$sql);

header( 'location:Message_Success.php' );
exit();


?>
