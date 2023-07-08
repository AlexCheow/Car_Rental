<?php include("connection.php");?>
<?php
if ( $_GET && $_GET[ 'id' ] != null ) {
  $id = $_GET[ 'id' ];
} else {
  echo '<script language="javascript">';
  echo ' window.history.back();';
  echo '</script>';
}
$query = "SELECT reservation.reservation_number,cars.Name AS Name, cars.Price AS unit_price , payment.total, payment.total/cars.Price AS qty, reservation.customer_firstname AS customer_name FROM reservation 
				INNER JOIN cars ON cars.car_id = reservation.cars_id
				INNER JOIN payment ON payment.reservationid = reservation.reservation_id WHERE reservation.reservation_id = '$id' LIMIT 1";
$runQuery = mysqli_query( $conn, $query );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
<script src="https://use.fontawesome.com/e53f5d3822.js"></script>
<link rel="stylesheet" href="css/receipt.css">
</link>
</head>

<body>
<div class="page-content container">
  <?php while($receipt = mysqli_fetch_array($runQuery)) { ?>
  <div class="page-header text-blue-d2">
    <h1 class="page-title text-secondary-d1"> Reservation <small class="page-info"> <i class="fa fa-angle-double-right text-80"></i> Number: <?php echo $receipt['reservation_number'] ?> </small> </h1>
    <div class="page-tools">
      <div class="action-buttons"> <a class="btn bg-white btn-light mx-1px text-95" onclick="window.print();" data-title="Print"> <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i> Print </a> <a class="btn bg-white btn-light mx-1px text-95" href="User_Home.php" data-title="PDF"> <i class="mr-1 fa fa-home text-danger-m1 text-120 w-2"></i> Home </a> </div>
    </div>
  </div>
  <div class="container px-0">
    <div class="row mt-4">
      <div class="col-12 col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="text-center text-150"> <span class="text-default-d3">Auto Club Rental</span> </div>
          </div>
        </div>
        <!-- .row -->
        
        <hr class="row brc-default-l1 mx-n1 mb-4" />
        <div class="row">
          <div class="col-sm-6">
            <div> <span class="text-sm text-grey-m2 align-middle">To:</span> <span class="text-600 text-110 text-blue align-middle"><?php echo $receipt['customer_name'] ?></span> </div>
          </div>
          <!-- /.col -->
          
          <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
            <hr class="d-sm-none" />
            <div class="text-grey-m2">
              <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125"> Invoice </div>
              <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?php echo $receipt['reservation_number'] ?></div>
              <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge bg-success ">Paid</span></div>
            </div>
          </div>
          <!-- /.col --> 
        </div>
        <div class="mt-4">
          <div class="row text-600 text-white bgc-default-tp1 py-25">
            <div class="d-none d-sm-block col-1">#</div>
            <div class="col-9 col-sm-5">Description</div>
            <div class="d-none d-sm-block col-4 col-sm-2">Days</div>
            <div class="d-none d-sm-block col-sm-2">Price/day</div>
            <div class="col-2">Amount</div>
          </div>
          <div class="text-95 text-secondary-d3">
            <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
              <div class="d-none d-sm-block col-1">1</div>
              <div class="col-9 col-sm-5"><?php echo $receipt['Name'] ?></div>
              <div class="d-none d-sm-block col-2"><?php echo $receipt['qty'] ?></div>
              <div class="d-none d-sm-block col-2 text-95">RM <?php echo $receipt['unit_price'] ?></div>
              <div class="col-2 text-secondary-d2">RM <?php echo $receipt['total'] ?></div>
            </div>
          </div>
          <div class="row border-b-2 brc-default-l2"></div>
          <div class="row mt-3">
            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0"> Please show the reservation number during check-in </div>
            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
              <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                <div class="col-7 text-right"> Total Amount </div>
                <div class="col-5"> <span class="text-150 text-success-d3 opacity-2">RM <?php echo $receipt['total'] ?></span> </div>
              </div>
            </div>
          </div>
          <hr/>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</body>
</html>