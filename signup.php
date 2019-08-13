<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Create a new account</title>
		<link rel="icon" href="./img/signup.png" type="image/icon type">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="./signup/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="./signup/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('./signup/img/signup-bg-1.jpg');">
			<div class="inner" style="border-radius: 10px;">

				<form action="./db_connection/db_signup.php" method="POST">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" name="first_name" required>
						<input type="text" placeholder="Last Name" class="form-control" name="last_name" required>
					</div>
					<div class="form-wrapper">
						<input  type="text" placeholder="Username" class="form-control" name="email" required>
						<i class="">@eveil.com</i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Mobile Number" class="form-control" name="phone_number" required>
						<i class="zmdi zmdi-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper" style="float: right;">
							<a href="login.php" style="text-decoration: none;color: #111;">already have an account?</a>
						</div><div style="clear:both;"></div>
					<button type="submit" name="signup_submit">Sign Up
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<script>
            var password = document.getElementById("password") , confirm_password = document.getElementById("confirm_password");
            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
          </script>
				</form>

			</div>
		</div>
	</body>
</html>
