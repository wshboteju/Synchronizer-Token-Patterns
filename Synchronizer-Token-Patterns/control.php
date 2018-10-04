<?php

session_start();

function generateToken( $formName )
{

return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function checkToken( $token)
{

    return $token ===$_SESSION['csrf_token'];
}


if (!$_SESSION["loged"]) {

    header('Location: index.php');
    exit();

} else {

    echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">

    <strong>Welcome!</strong>
  </div></div>';

}
if (isset($_POST['csrf_token']) && isset($_POST['fname']) && isset($_POST['lname'])) {

    if (checkToken($_POST['csrf_token'])) {
      echo '<div class="container">  <div class="alert alert-success alert-dismissible fade in">
Settings updated
    </div></div>';


    } else {

      echo '<div class="container">  <div class="alert alert-danger alert-dismissible fade in">

      invalid csrf token
    </div></div>';
    }

}



?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="control.php">>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Update User Settings
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter first name">
						<input class="input100" type="text" name="fname" placeholder="First Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter last name">
						<input class="input100" type="text" name="lname" placeholder="Last Name">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
					<div style="margin-bottom: 25px" class="input-group">

                                          <input id="login-username" type="hidden" class="form-control" name="csrf_token" value=<?php echo '"' . generateToken('sec') . '"';?>>
                                            </div>



					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Update
						</button>
					</div>
					
					<a href="logout.php">Logout</a> 


				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>