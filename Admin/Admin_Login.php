<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
#password_logo {
    position: absolute;
    display: flex;
    padding-left: 90%;
    padding-top: 11px;
}
</style>

<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!--Custom styles--> 
<!--<link rel="stylesheet" type="text/css" href="css/Login_Design.css">-->
<link rel="stylesheet" href="../css/Login_Design.css">
<title>Admin Login</title>
</head>

<body>
<div class="container">
<div class="d-flex justify-content-center h-100">
<form  action="Admin_Login_Code.php" method="post">
  <?php
  if ( isset( $_GET[ 'error' ] ) ) {


    ?>
  <p class='error'><?php echo $_GET['error']; ?></p>
  <?php } ?>
  <div class="container">
  <div class="d-flex justify-content-center h-100">
  <div class="card">
  <h1><u>ADMIN LOGIN</u></h1>
  <div class="card-body">
    <div class="input-group form-group">
      <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
      <input class="form-control" type="text" name="username" id="username" placeholder="Username: ">
    </div>
    <div class="input-group form-group">
      <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
      <input class="form-control" type="password" name="pwd" id="user_pwd" placeholder="Password: ">
      <i class="fa fa-eye-slash" aria-hidden="true" onclick="changeIcon(this)" id="password_logo"></i>
      </input>
      <br/>
    </div>
    <script>
	function changeIcon(x) {
	var x = document.getElementById("user_pwd");
	var y = document.getElementById("password_logo");
	if (x.type === "password") {
    x.type = "text";
	y.class("fa fa-eye");
  } else {
    x.type = "password";
    y.class("fa fa-eye-slash");
  }
					
  					
}
			</script>
    <div class="form-group">
      <button class="btn float-right login_btn"  type="submit">Login</button>
    </div>
    <!--<div class="signuptext" style="color: white">
      <h2 id="signuptext">Don't Have An Accpunt Yet?</h2>
    </div>
    <div class="signup">
      <h2 id="signup">Sign Up</h2>
    </div>--> 
  </div>
</form>
</body>
</html>