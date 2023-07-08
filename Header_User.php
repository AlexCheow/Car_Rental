<?php
include_once('Link.php')
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<div class="navbar-brand">

			<a href="#" class="nav-link" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">Auto Club Rental</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a class="nav-link" href="User_Home.php">Home</a></li>
			<li><a class="nav-link" href="Gallery.php">Gallery</a></li>
			<li><a class="nav-link" href="Booking.php">Reservation</a></li>
			<li><a class="nav-link" href="ViewBooking.php">Your Booking</a></li>
			<li><a class="nav-link" href="Contact_Us.php">Contact Us</a></li>
			<li><a class="nav-link" href="View_Profile.php">Profile</i></a></li>
	<li><a class="nav-link" href="#" onclick="confirmLogout()">Logout</i></a></li>
        	</li> 	
		</ul>
	</div>
	</div>
</nav>
<script>
    function confirmLogout() {
        var result = confirm("Are you sure you want to logout?");
        if (result) {
            window.location.href = "Login.php";
        }
    }
</script>