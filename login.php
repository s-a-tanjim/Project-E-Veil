<?php
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login your account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="./login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="./login/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('./login/img/signin-bg-3.jpg');">
			<div class="inner" style="border-radius: 10px;">

				<form action="./db_connection/db_login.php" method="POST">
					<h3>Login Form</h3>
					<div class="form-wrapper">
						<input  type="email" placeholder="Email" class="form-control" name="email" required>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
							<a href="forgetpw.html" style="text-decoration: none;color: #111;">forget password?</a>
							<div style="float: right;"><a href="signup.php" style="text-decoration: none;color: #111;">Create new account</a></div>
					</div>
					<button type="submit" name="login_submit">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>

			</div>
		</div>
	</body>
</html>
