<!-- CSS is from login page -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Recover your password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="./login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="./login/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('./login/img/forgetpw-bg-1.jpg');">
			<div class="inner" style="border-radius: 10px;">

				<form action="#" method="POST">
					<h3>Password Recovery</h3>
					<div class="form-wrapper">
						<input  type="email" placeholder="Email" class="form-control" name="email" required>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Mobile Number" class="form-control" name="phone_number" required>
						<i class="zmdi zmdi-phone"></i>
					</div>
					<div class="form-wrapper">
							<a href="login.php" style="text-decoration: none;color: #111;">login</a>
							<div style="float: right;"><a href="signup.php" style="text-decoration: none;color: #111;">Create new account</a></div>
					</div>
					<button type="submit" name="pw_submit">Submit
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>

			</div>
		</div>
	</body>
</html>
