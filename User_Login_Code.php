<?php
include_once('Link.php')
?>
<?php
require_once('connection.php');
session_start();
$username = $_POST['username'];
$password = $_POST['pwd'];

$sql = "SELECT * from user Where Username='$username' AND Password='$password'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$username = $row['Username'];
		$password = $row['Password'];
		$_SESSION['ID'] = $row['ID'];
		$_SESSION['First_Name'] = $row['First_Name'];
		$_SESSION['Last_Name'] = $row['Last_Name'];
		$_SESSION['Username'] = $row['Username'];
		header('location:User_Home.php');
		exit();
	}
}
else
{
	echo header('location:LoginError.php');
	
}
?>