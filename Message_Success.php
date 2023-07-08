<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/20f9eb1058.js" crossorigin="anonymous"></script>
<title>Message Sent Successfully</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
		}
		
		.fa-circle-check{
			color: limegreen;
			font-size: 80px;
		}
		
		.success-message {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
	
	</style>
</head>

<body>
	<div class="success-message">
		<i class="fa-sharp fa-solid fa-circle-check"></i>
		<h1 class="success-message__title">Message Received</h1>
		<p class="success-message__title2">We Will Get To You As Soon As Possible</p>
		<div class="success-message__button">
        <button type="submit"  onClick="location.href='User_Home.php'">Return To Home</button>
		</div>
	</div>
	<script>
		
	</script>
</body>
</html>
