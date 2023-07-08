<?php
include_once('Link.php')
?>
<?php
require_once('connection.php');
session_start();
$username = $_POST['username'];
$password = $_POST['pwd'];

$sql = "SELECT * from admin Where admin_username='$username' AND admin_password='$password'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$username = $row['admin_username'];
		$password = $row['admin_password'];
		$_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['admin_firstname'] = $row['admin_firstname'];
		$_SESSION['admin_lastname'] = $row['admin_lastname'];
		$_SESSION['admin_username'] = $row['admin_username'];
		header('location:Admin_Home.php');
		exit();
	}
}
else
{
	echo header('location:LoginError.php');
	
}
?>