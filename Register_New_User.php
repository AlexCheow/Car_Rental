<?php
include_once( 'Link.php' )
?>
<?php
include_once( 'connection.php' )
?>
<?php
// Check if the form is submitted

// Check if the form is submitted
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
  // Database credentials
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "car_rental";

  // Create a new connection
  $conn = new mysqli( $servername, $username, $password, $database );

  // Check the connection
  if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
  }

  // Fetch values from the form
  $first_name = $_POST[ 'first_name' ];
  $last_name = $_POST[ 'last_name' ];
  $username = $_POST[ 'username' ];
  $gender = $_POST[ 'gender' ];
  $password = $_POST[ 'password' ];
  $ic = $_POST[ 'ic' ];
  $phone_number = $_POST[ 'phone_number' ];
  $email = $_POST[ 'email' ];

  // Verify reCAPTCHA response
  $recaptchaResponse = $_POST[ 'g-recaptcha-response' ];

  // Make a POST request to the reCAPTCHA API
  $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
  $recaptchaSecretKey = '6LcAVuomAAAAAHeDaTYllZD1gEM7OVddtGAqvtjs';
  $recaptchaData = [
    'secret' => $recaptchaSecretKey,
    'response' => $recaptchaResponse
  ];

  $recaptchaOptions = [
    'http' => [
      'method' => 'POST',
      'content' => http_build_query( $recaptchaData )
    ]
  ];

  $recaptchaContext = stream_context_create( $recaptchaOptions );
  $recaptchaResult = file_get_contents( $recaptchaUrl, false, $recaptchaContext );
  $recaptchaResult = json_decode( $recaptchaResult );

  // Check the reCAPTCHA result
  if ( $recaptchaResult->success ) {
    // Prepare the insert statement
    $stmt = $conn->prepare( "INSERT INTO user (First_Name, Last_Name, Username, Gender, Password, IC, Phone Number, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)" );

    // Bind the parameters
    $stmt->bind_param( "ssssssss", $first_name, $last_name, $username, $gender, $password, $ic, $phone_number, $email );

    // Execute the statement
    if ( $stmt->execute() ) {
      // Registration successful
      echo "User registered successfully.";
    } else {
      // Error occurred
      echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
  } else {
    // reCAPTCHA verification failed
    echo "reCAPTCHA verification failed. Please try again.";
  }

  // Close the connection
  $conn->close();
}
?>

<!-- HTML form for user registration with Bootstrap and CSS --> 
<!DOCTYPE html>
<html>
<head>
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcAVuomAAAAAHeDaTYllZD1gEM7OVddtGAqvtjs"></script> 
<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.enterprise.ready(async () => {
      const token = await grecaptcha.enterprise.execute('6LcAVuomAAAAAHeDaTYllZD1gEM7OVddtGAqvtjs', {action: 'LOGIN'});
      // IMPORTANT: The 'token' that results from execute is an encrypted response sent by
      // reCAPTCHA Enterprise to the end user's browser.
      // This token must be validated by creating an assessment.
      // See https://cloud.google.com/recaptcha-enterprise/docs/create-assessment
    });
  }
</script>
<title>User Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body {
    background-image: url("picture/Home_Background1.jpg");
    background-size: cover;
    background-position: center;
    padding-top: 50px;
    padding-bottom: 50px;
}
.card {
    max-width: 400px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.9);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
}
.card-header {
    background-color: #f8f9fa;
    border-bottom: none;
    text-align: center;
}
.card-body {
    padding: 30px;
}
.form-group label {
    font-weight: bold;
}
.form-control {
    border-radius: 5px;
}
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
}
.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
}
.btn-link {
    color: #007bff;
}
.btn-link:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
 <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">User Registration</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="register_newuser_code.php">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>

                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="ic">IC:</label>
                                <input type="text" class="form-control" name="ic" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LcAVuomAAAAAHeDaTYllZD1gEM7OVddtGAqvtjs"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-left">
                        <a href="login.php" class="btn btn-link">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="card-footer text-left"> <a href="login.php" class="btn btn-link">Back</a> </div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>