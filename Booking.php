<?php
require( 'Header_User.php' )
?>
<?php include_once('Link.php' )?>
<?php include("connection.php");?>
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
	
@media only screen and (max-width: 768px) {
  .card img {
    width: 100%!important;
    height: auto!important;
    object-fit: cover!important;
  }
  
  .col-md-4 {
    flex-basis: 100%!important;
    max-width: 100%!important;
  }
  
  .row {
    flex-direction: column!important;
  }
}		

</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
          <!--<form method="POST" action="" onsubmit="return validateForm();" onsubmit="calculateDays();">
          <div class="col">
            <div class="input-group date" data-target-input="nearest">
              <label for="startDate" id="startend">Start</label>
              <input id="startDate" class="form-control" name="startDate" type="date" />
            </div>
          </div>
          <div class="col">
            <div class="input-group date" data-target-input="nearest">
              <label for="endDate" id="startend">End</label>
              <input id="endDate" class="form-control" name="endDate" type="date" />
            </div>
          </div>
          <input id="days" name="days" hidden="">
          </input>
          <button type="submit" id="findbtn">Find Cars</button>
          </form>-->
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm();">
            <div class="form-group">
              <label for="startDate">Start Date</label>
              <input id="startDate" class="form-control" name="startDate" type="date" required>
            </div>
            <div class="form-group">
              <label for="endDate">End Date</label>
              <input id="endDate" class="form-control" name="endDate" type="date" required>
            </div>
            <input id="days" name="days" hidden="">
            <button type="submit" class="btn btn-primary">Find Cars</button>
          </form>
          
          <!--Disable Previous Date--> 
          <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#startDate').attr('min',today);
		$('#endDate').attr('min',today);
    </script> 
        </div>
        
        <!--End Date Must Not Greater Than Start Date Validation--> 
        <script>
  $("#endDate").change(function() {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    if ((Date.parse(endDate) <= Date.parse(startDate))) {
      alert("End date should be greater than Start date");
      document.getElementById("endDate").value = "";
    }
  });
</script> 
        <script>
  function validateForm() {
    var StartDate = document.getElementById("startDate").value;
	var EndDate = document.getElementById("endDate").value;
    
    if (StartDate === "" || EndDate ==="") {
      alert("Please Provide DATE");
      return false;
    }
	else  
    
    return true;
  }
</script> 
        <script>
document.querySelector('form').addEventListener('submit', function(event) {
  var startDate = document.getElementById("startDate").value;
  var endDate = document.getElementById("endDate").value;

  var start = new Date(startDate);
  var end = new Date(endDate);
  var timeDiff = Math.abs(end.getTime() - start.getTime());
  var days = Math.ceil(timeDiff / (1000 * 3600 * 24));

  document.getElementById("days").value = days;
});
</script>
        <div class="row">
          <?php
          if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
            $days = $_POST[ 'days' ];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "car_rental";

            $startdate = $_POST[ 'startDate' ];
            $enddate = $_POST[ 'endDate' ];
            $_SESSION[ 'startDate' ] = $startdate;
            $_SESSION[ 'endDate' ] = $enddate;


            // Create connection
            $conn = new mysqli( $servername, $username, $password, $dbname );
            // Check connection
            if ( $conn->connect_error ) {
              die( "Connection failed: " . $conn->connect_error );
            }

            //$sql = "SELECT * FROM cars WHERE car_id NOT IN (SELECT cars_id FROM reservation WHERE (date_from <= '$startdate' AND date_end >= '$enddate') OR (date_end >= '$enddate' AND date_from <= '$startdate')) ";

            $sql = "SELECT c.*
			FROM cars c
			WHERE c.car_id NOT IN (
    		SELECT r.cars_id
    		FROM reservation r
			WHERE ('$startdate' BETWEEN r.date_from AND r.date_end OR '$enddate' BETWEEN r.date_from AND r.date_end OR date_from BETWEEN '$startdate' AND '$enddate')
    		GROUP BY r.cars_id
			HAVING SUM(r.quantity) >= (
			SELECT (c.Number - COALESCE(SUM(r2.quantity), 0))
			FROM cars c
			LEFT JOIN reservation r2 ON c.car_id = r2.cars_id
			WHERE c.car_id = r.cars_id
			GROUP BY c.car_id
			))";


            $result = $conn->query( $sql );
            while ( $row = $result->fetch_assoc() ) {
              ?>
          <div class="col d-flex mb-4" id="mobile-card">
            <div class="card" id="card"> <?php echo'<img src="data:image;base64,'.base64_encode($row['Images']).'">';?>
              <div class="card-body flex-column d-flex">
                <h5 class="card-title"><?php echo $row['Name']?></h5>
                <p class="card-text"><?php echo $row['Description']?></p>
                <div class="mt-auto"> <span>Size: <?php echo $row['Size']?></span><br>
                  <span>Price: RM <?php echo $row['Price']?>/Day</span> </div>
                <form action="Reservation_Form.php" method="post">
                  <input name="userid" value="<?php echo $_SESSION['ID']?>" type="hidden">
                  <input name="datefrom" value="<?php echo $startDate?>" type="hidden">
                  <input name="car_id" value="<?php echo $row['car_id']?>" type="hidden">
                  <input name="car_name" value="<?php echo $row['Name']?>" type="hidden">
                  <input name="price" value="<?php echo $row['Price'] * $days?>" type="hidden">
                  <?php
                  $totaldaysprice = $row[ 'Price' ] * $days;
                  $_SESSION[ 'totalprice' ] = $totaldaysprice;

                  ?>
                  <button type="submit" class="btn btn-primary mt-auto m-2 float-end" >BOOK NOW</button>
                </form>
              </div>
            </div>
          </div>
          <?php
          }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>