<?php
require( 'Header_User.php' )
?>
<?php
include_once( 'Link.php' )
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
body {
  overflow-x: hidden; /* Hide horizontal scrollbar */
}
	.map-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* 16:9 aspect ratio (change if needed) */
        }

        /* Make the map responsive */
        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
	.h-100{
			position: relative;
		}
h3#text1 {
    margin-top: 50px;
}
	.reservation-btn {
  width: 100%;
  text-align: center;
}
	.button-85 {
	width: 100%;
		height: 160px;
  padding: 0.6em 0;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
		font-size: 36px;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 0px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 0px;
}
	.button-85:hover{
		-webkit-transform: scale(1.0);
	}
	
	@media only screen and (max-width: 300px) {
		body{
			width: 460%;
		}
		
}
		
	
	
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="css/Home_Design.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/20f9eb1058.js" crossorigin="anonymous"></script>
</svg>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<title>Car Rental</title>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active"><img src="picture/Home_Background1.jpg" class="d-block h-100 w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Adventure Awaits</h5>
        <p>Conquer Any Terrain with Our Reliable SUV Rentals</p>
      </div>
    </div>
    <div class="carousel-item"><img src="picture/nav_pic.jpg" class="d-block h-100 w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fuel Your Need for Speed</h5>
        <p>Feel the Thrill with Our Sports Car Rentals</p>
      </div>
    </div>
    <div class="carousel-item"><img src="picture/User_Login_Wallpaper.jpg" class="d-block h-100 w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Compact and Convenient</h5>
        <p>Explore the City with Our Nimble Car Rentals</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
</div>
<!--<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button" style="padding: 2.6%; font-size: 300%; background-color: orange">
  <a href="Booking.php" style="color: orange">MAKE YOUR CAR RESERVATION NOW</a>
  </button>
</div>-->
<div class="reservation-btn">
<button class="button-85" role="button">MAKE YOUR CAR RESERVATION NOW</button>
</div>

</head>

<body>
<br/>
<br/>
<br/>
<br/>
<h1 class="modal-title text-center"><u>TYPES OF CARS</u></h1>
<br/>
<br/>
<br/>
<br/>
<div class="container">
  <div class="row" id="mobile-row">
    <div class="col-sm-3">
      <div class="card" style="height: 110%"> <img class="card-img-top img-fluid" src="picture/typecar1.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title text-center">SEDAN</h4>
          <p class="card-text text-center">A sedan has four doors and a traditional trunk. Like vehicles in many categories, they're available in a range of sizes from small to compacts to mid-size and full-size (Toyota Avalon, Dodge Charger). Luxury brands like Mercedes-Benz and Lexus have sedans in similar sizes as well.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card" style="height: 110%"> <img class="card-img-top img-fluid" src="picture/typecar2.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title text-center">COUPE</h4>
          <p class="card-text text-center">A coupe has historically been considered a two-door car with a trunk and a solid roof. This would include cars like a Ford Mustang or Audi A5—or even two-seat sports cars . Recently, however, car companies have started to apply the word "coupe" to four-door cars or crossovers with low, sleek rooflines that they deem "coupe-like." This includes vehicles as disparate as a Mercedes-Benz CLS sedan and BMW X6 SUV. At Car and Driver, we still consider a coupe to be a two-door car.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card" style="height: 110%"> <img class="card-img-top img-fluid" src="picture/typecar3.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title text-center">SPORTS CAR</h4>
          <p class="card-text text-center">These are the sportiest, hottest, coolest-looking coupes and convertibles—low to the ground, sleek, and often expensive. They generally are two-seaters, but sometimes have small rear seats as well. Then there are the high-end exotic dream cars with sky-high price tags for the one percent, cars like the Ferrari 488 GTB and Aston Martin Vantage, which stop traffic with their spaceship looks.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card" style="height: 110%"> <img class="card-img-top img-fluid" src="picture/typecar4.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title text-center">SPORT-UTILITY VEHICLE (SUV)</h4>
          <p class="card-text text-center">SUVs—often also referred to as crossovers—tend to be taller and boxier than sedans, offer an elevated seating position, and have more ground clearance than a car. They include a station wagon-like cargo area that is accessed through a flip-up rear hatch door, and many offer all-wheel drive. The larger ones have three rows of seats. Sizes start at subcompact, mid-size, and go all the way to full-size. Luxury brands offer many SUV models in most of the same size categories.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
<br/>
<h3 class="text-center" id="text1"><b>Experience the epitome of luxury with our premium car rental service. Our fleet includes high-end vehicles from renowned brands, ensuring a comfortable and stylish journey for our discerning customers.</b></h3>
<br/>
<h4 class="text-center" style="color: orange"><b>Whether you're attending a special event or looking to impress, our elegant selection of cars is designed to elevate your driving experience to new heights.</b></h4>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div id="fh5co-services-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="services"> <span><i class="fa-solid fa-location-crosshairs"></i></span>
          <div class="desc">
            <h3>Accessible Location</h3>
            <p>Our car rental agency is conveniently located, providing easy access for customers. No matter where you are coming from, our location is within reach, ensuring a smooth and hassle-free experience. We are situated in a prime spot near major roads, making it convenient for you to pick up and drop off your rental vehicle. Say goodbye to long journeys and enjoy the convenience of our accessible location.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services"> <span><i class="fa-regular fa-clock"></i></span>
          <div class="desc">
            <h3>Open 24/7</h3>
            <p>Explore our wide selection of cars available for rent at any time. Whether you need a vehicle for a business trip or a family vacation, we are here to provide you with reliable and convenient car rental services.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services"> <span><i class="fa-regular fa-calendar"></i></span>
          <div class="desc">
            <h3>Reservation</h3>
            <p>Make a reservation today and secure your preferred car rental. Our simple and efficient reservation process ensures that you can book your desired vehicle with ease. Plan ahead and enjoy a hassle-free experience when you arrive at our location.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services"> <span></span>
          <div class="desc">
            <h3></h3>
            <p></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="services"> <span><i class="fa-regular fa-face-smile-beam"></i></span>
          <div class="desc">
            <h3>Friendly Staff</h3>
            <p>Our dedicated and friendly staff is ready to assist you throughout your car rental journey. From helping you choose the right vehicle to providing guidance on routes and destinations, we are committed to ensuring your satisfaction and making your trip a memorable one.
</p>
          </div>
        </div>
      </div>
      <!--<div class="col-md-4">
					<div class="services">
						<span><i class="fa-solid fa-wifi"></i></span>
						<div class="desc">
							<h3>Free Wifi</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="services">
						<span><i class="fa-solid fa-spa"></i></span>
						<div class="desc">
							<h3>SPA</h3>
							<p>It's been over a year since we've spent our time confined at home and we understand that things can get a little tough sometimes. For those in need of some me-time and relaxation, a luxurious staycation at here may be just what you need, but better yet, add on a spa session for some much-deserved pampering!</p>
						</div>
					</div>
				</div>--> 
    </div>
  </div>
</div>
<br/>
<br/>
<br/>
<h1 class="text-center">WE ARE HERE</h1>
<br/>
<br/>
<div class="map-container">
  <iframe name="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d993.0251509316831!2d100.31367316961716!3d5.401641934810574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac3cfb948064f%3A0xf9ad9c40339fa324!2s312%2C%20Jln%20Perak%2C%20Taman%20Desa%20Green%2C%2011600%20Jelutong%2C%20Pulau%20Pinang!5e0!3m2!1sen!2smy!4v1687417257326!5m2!1sen!2smy" width="1920" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!--<div class="row">
		<div class="col-lg-6">
			<img src="Image/Sixty-and-Me_5-Ways-to-Enjoy-Solitude-Instead-of-Feeling-Lonely.jpg" width="71.2%" style="display: block;margin-left: auto;margin-right: auto; padding:0; vertical-align: middle;" class="img-responsive">
			<div class="col-lg-12" id="text">
				<h2 class="text-center" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><b>A Comforting Solitude</b></h2>
				<p class="text-center">Each room at 7th Heaven Hotel provides you with highly quality room amenities to ensure that your vacation is serene and relaxing.</p><br/>
				<a href="Gallery.php" class="btn" style="position: absolute; left: 24.5%; transform: translate(-50%,-50%); font-size: 120%;"><u>Discover More</u></a>
			</div>
		</div>
		
		
	<div class="col-lg-6">
			<img src="Image/2a1a02_81956f8134244232b60d0e5a4cd0526d_mv2.webp" width="60%" style="display: block;margin-left: auto;margin-right: auto; padding:0; vertical-align: middle"; class="img-responsive">
		<div class="col-lg-12" id="text">
				<h2 class="text-center" style="text-align: center;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><b>Hotel Facilities</b></h2>
				<p class="text-center">More than just outstanding room accommodations, we provide top-class facilities and services to make your stay with us.</p><br/>
				<a href="Gallery.php" class="btn" style="position: absolute; left: 75.5%; transform: translate(-50%,-50%); font-size: 120%;"><u>Discover More</u></a>
		</div>
	</div>
	</div>--> 

<br/>
<br/>
<br/>
</body>
</html>
