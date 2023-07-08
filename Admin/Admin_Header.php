<?php include_once('Link.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="#" class="nav-link" style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">Auto Club Rental</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a class="nav-link" href="Admin_Home.php">Home</a></li>
			<li><a class="nav-link" href="Admin_Cars.php">Cars</a></li>
            <li><a class="nav-link" href="Customer_List.php">Customer</a></li>
            <li><a class="nav-link" href="Admin_View_Booking.php">View Booking</a></li>
            <li><a class="nav-link" href="Check-In.php">Check-In</a></li>
            <li><a class="nav-link" href="Check-Out.php">Check-Out</a></li>
            <li><a class="nav-link" href="Reservation_History.php">History</a></li>
            <li><a class="nav-link" href="Gallery.php">Gallery</a></li>
            <li><a class="nav-link" href="Customer_Service.php">Customer Services</a></li>
            <li><a class="nav-link" href="#" onclick="confirmLogout()">Logout</a></li>
        </ul>
    </div>
</nav>

<script>
    function confirmLogout() {
        var result = confirm("Are you sure you want to logout?");
        if (result) {
            window.location.href = "Admin_Login.php";
        }
    }
</script>
