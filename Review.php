<?php
include_once('Link.php')
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
	#wrapper {
   margin: auto;
   width: 990px;
}
			body { background:url("Image/reviewbg.jpg")fixed no-repeat;background-size: cover }
		</style>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Review</title>
		<h1 class="text-center">Rate & Review</h1>
		<br/><br/>
		<br/><br/>
		<div class="card" style="width: 50%; margin-left: auto; margin-right: auto;">
			<div class="card-header text-center">
				<h2>Add Reviews</h3>
			</div>
		<form method="post">
  <div class="mb-3">
	<label for="text" class="form">How was the Services?</label>
	 <input type="radio" name="ratingstars" id="onestar" value="1" required>	  
	<label for="onestar">1</label><i class="fa fa-star" style="color: orange"></i>
	  <input type="radio" name="ratingstars" id="twostar" value="2">	  
	<label for="twostar">2</label><i class="fa fa-star" style="color: orange"></i>
	  <input type="radio" name="ratingstars" id="threestar" value="3">	  
	<label for="threestar">3</label><i class="fa fa-star" style="color: orange"></i>
	  <input type="radio" name="ratingstars" id="fourstar" value="4">	  
	<label for="fourstar">4</label><i class="fa fa-star" style="color: orange"></i>
	  <input type="radio" name="ratingstars" id="fivestar" value="5">	  
	<label for="fivestar">5</label><i class="fa fa-star" style="color: orange"></i>

	  <br/>
	<label for="username" class="form">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="textarea" class="form-label">Your review</label>
    <textarea id="review" name="review" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary center" name="submit" value="submit">Submit</button>	
</form>
		</div>
		<br/><br/><br/>
			<h2 class="text-center"><u>Review By Others</u></h2>
		<br/><br/>
		
			<?php
				$conn = mysqli_connect("localhost", "root", "", "car_rental");

				if($conn->connect_error)
				{
					die("Connection Failed". $conn->connect_error);
				}
				$sql = "SELECT * from review";
				$result = $conn->query($sql);

				//display table from databse
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						?>
				
          	 	 <div class="card">
  				<div class="align-items-center card-header d-flex justify-content-between" id="headingOne"><h5>By <?php echo $row['username']?> <?php
						
						for($i = 0; $i<$row["rating"]; $i++)
						{
							echo '<i class="fa fa-star" style="color: orange"></i>';
						}?></h5>
				<h6 style="font-size: 75%;"></h6>
						<div class="card-summary">
						<?php echo $row['date']?>
						</div>
				</div>
				<div id="collapse" class="collapse" aria-labelledby="headingOne">
  					
				</div>
					 <div class="card-body">
   					 <p><?php echo $row['content'] ?></p>
						
  					</div>
						 
				
				</div>		
						<?php
					}
					
				}
				else
				{
					echo "0 Result";
				}
				$conn->close();
			?>
		      
	</head>
	<body>
		<?php
		if(isset($_POST["submit"]))
		{
		$date = date('Y-m-d');
        $conn = mysqli_connect("localhost", "root", "", "car_rental");
        mysqli_query($conn, "INSERT into review(reviewid,username, date, content, rating) values(NULL, '$_POST[username]','$date','$_POST[review]','$_POST[ratingstars]')");
        $conn->close();
        ?>   
<script type="text/javascript">
window.location.href=window.location.href;
</script>
<?php
}
?>
		
	</body>
</html>