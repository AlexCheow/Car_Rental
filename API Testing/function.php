<?php
require 'connection.php';

function error422( $message ) {
  $data = [
    'status' => 422,
    'message' => $message,
  ];
  header( "HTTP/1.0 422 Unprocessable Entity" );
  echo json_encode( $data );
  exit();
}


function getCarList() {
  global $conn;

  $sql = "SELECT * FROM cars";
  $result = $conn->query( $sql );

  if ( $result->num_rows > 0 ) {
    $carList = array();

    while ( $row = $result->fetch_assoc() ) {
      $carList[] = array(
        "Car ID: " => $row[ "car_id" ],
        "Name " => $row[ "Name" ],
        "Description " => $row[ "Description" ],
        "Size " => $row[ "Size" ],
        "Price " => $row[ "Price" ],
		"Quantity" => $row[ "Number" ],
		"Images Link" => $row["Image_Link"],
      );
    }
    return json_encode( $carList );
  } else
    $data = [
      'status' => 505,
      'message' => "No Data",
    ];

  header( "HTTP/1.0 505 No Data" );
  return json_encode( $data );
}



function getGallery() {
  global $conn;

  $sql = "SELECT * FROM gallery";
  $result = $conn->query( $sql );

  if ( $result->num_rows > 0 ) {
    $carList = array();

    while ( $row = $result->fetch_assoc() ) {
      $carList[] = array(
        "Gallery ID: " => $row[ "gallery_id" ],
        //"Image " => $row[ "gallery_img" ],
        "Title " => $row[ "gallery_title" ],
        "ImageLink " => $row[ "gallery_link" ],
      );
    }
    return json_encode( $carList );
  } else
    $data = [
      'status' => 505,
      'message' => "No Data",
    ];

  header( "HTTP/1.0 505 No Data" );
  return json_encode( $data );
}

/*function getCars($carsParams){
	global $conn;
	
	if($carsParams['id'] == null){
		return error422("Enter car id");
	}
	
	$carsid = mysqli_real_escape_string($conn, $carsParams['id']);
	$query = "SELECT * FROM cars WHERE car_id = '$carsid' LIMIT 1";
	$result = mysqli_query($conn, $query);
	
	if($result){
		if(mysqli_num_rows($result) == 1){
			$res = mysqli_fetch_assoc($result);
			echo $res["Name"];
			$data = [
				'status' => 200,
				'message' => "Car Fetched Successfully",
				'data' => $res,
			];
			
			header("HTTP/1.0 200 OK");
			return json_encode($data);
		} else {
			$data = [
				'status' => 404,
				'message' => "Car not found",
			];
			
			header("HTTP/1.0 404 Not Found");
			return json_encode($data);
		}
	} else {
		$data = [
			'status' => 500,
			'message' => "Internal Server Error",
		];
		
		header("HTTP/1.0 500 Internal Server Error");
		return json_encode($data);
	}
}*/

function newMember() {
  global $conn;
}

function Gallery() {
  global $conn;
  $sql = "SELECT * from gallery";
  $result = $conn->query( $sql );
  while ( $row = mysqli_fetch_array( $result ) ) {
$carGallery[] = array(
        "Gallery_Name" => $row[ "gallery_name" ],
        "Gallery_Image" => $row[ "gallery_img" ],
        "Gallery_Title" => $row[ "gallery_title" ],
      );

    ?>
<div class="col-md-4 project-item mix <?php echo $row[ "gallery_title" ];?>">
  <div class="project-thumb"> <?php echo'<img src="data:image;base64,'.base64_encode($row[ "gallery_img" ]).'">';?>
    <div class="overlay-b">
      <div class="overlay-inner"> <a href="<?php echo $row['gallery_link'] ?>" class="fancybox fa fa-expand" title=""></a> </div>
    </div>
  </div>
  <div class="box-content project-detail">
    <h2 id="titletext"><a><?php echo $row["gallery_name"];?></a></h2>
  </div>
</div>
<!-- /.project-item -->

<?php
}

}

?>
