<?php require('Admin_Header.php' )?>
<?php include_once('Link.php' )?>
<?php include("connection.php");?>
<?php




//// Decode JSON data into PHP array
//$response_data = json_decode($json_data);
//
//// All user data exists in 'data' object
//$user_data = $response_data->data;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Gallery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
        <!--
        Artcore Template
		http://www.templatemo.com/preview/templatemo_423_artcore
        -->
        <link rel="stylesheet" href="../css/Gallery/css/bootstrap.css">
        <link rel="stylesheet" href="../css/Gallery/css/font-awesome.css">
        <link rel="stylesheet" href="../css/Gallery/css/animate.css">
        <link rel="stylesheet" href="../css/Gallery/css/templatemo-misc.css">
        <link rel="stylesheet" href="../css/Gallery/css/templatemo-style.css">
        <script src="../css/Gallery/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
		<style>
			#titletext
			{
				text-align: center;
			}
	.navbar-expand-lg .navbar-nav {
    flex-direction: row;
    margin-left: 1050px;
}
		</style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <section id="pageloader">
            <div class="loader-item fa fa-spin colored-border"></div>
        </section> <!-- /#pageloader -->

       

        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <h2>Gallery</h2>
                        <span></span>
						
                    </div> <!-- /.section-header -->
                </div> <!-- /.row -->
                <div class="projects-holder-3">
                    <div class="filter-categories">
                        <ul class="project-filter">
                            <li class="filter" data-filter="all"><span>All</span></li>
                            <li class="filter" data-filter="Super Car"><span>Super Car</span></li>
                            <li class="filter" data-filter="room"><span>SUV</span></li>
                            <li class="filter" data-filter="restaurant"><span>Sedan</span></li>
                        </ul>
                    </div>
					<div class="projects-holder">
                        <div class="row">
							<?php
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



?>
                        </div> <!-- /.row -->
                        <!--<div class="load-more">
                            <a href="javascript:void(0)" class="load-more">Load More</a>
                        </div>-->
                    </div> <!-- /.projects-holder -->
                </div> <!-- /.projects-holder-2 -->
            </div> <!-- /.inner-content -->
        </div> <!-- /.content-wrapper -->

        <script src="../css/Gallery/js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../css/Gallery/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="../css/Gallery/js/plugins.js"></script>
        <script src="../css/Gallery/js/main.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { 
                $('.loader-item').fadeOut(); 
                    $('#pageloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>

		
		<div class="content-wrapper">
        <div class="inner-container container">
            <div class="row">
                <div class="section-header col-md-12">
                    <h2>Add New Gallery</h2>
                    <span></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Add New Gallery Form -->
                    <form action="Add_Gallery.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gallery_name">Gallery Name</label>
                            <input type="text" class="form-control" id="gallery_name" name="gallery_name" required>
                        </div>
                        <div class="form-group">
                            <label for="gallery_image">Gallery Image</label>
                            <input type="file" class="form-control" id="gallery_image" name="gallery_image" required>
                        </div>
                        <div class="form-group">
                            <label for="gallery_title">Gallery Title</label><br/>
                             <input type="radio" name="gallery_title" id="Super Car" value="Super Car" />Super Car <br/>
    						<input type="radio" name="gallery_title" id="SUV" value="SUV" />SUV<br/>
    						<input type="radio" name="gallery_title" id="Sedan" value="Sedan" />Sedan<br/>
                        </div>
                        <div class="form-group">
                            <label for="gallery_link">Gallery Link</label>
                            <input type="text" class="form-control" id="gallery_link" name="gallery_link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Gallery</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <!-- Gallery Items -->
                <div class="projects-holder-3">
                    
                </div>
            </div>
        </div>
    </div>


		
    </body>
	
</html>
