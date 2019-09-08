<!-- CSS is from login page -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Recover your password</title>
	<link rel="icon" href="img/forgetpw.png" type="image/icon type">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="./login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link href="user_pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="./login/css/style.css">

	<style>
		.custom-button-for-responsive {
			/* For nav-bar button in responsive mood */
			margin-top: 0px;
			margin-right: 80px;
		}
	</style>
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php" style="letter-spacing:3px;"><i class="fas fa-user-secret" style="margin-right:6px;"></i>E-Veil</a>
			<button class="navbar-toggler custom-button-for-responsive" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="login.php" style="letter-spacing:1px;">Login
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signup.php" style="letter-spacing:1px;">Sign Up</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php" style="letter-spacing:1px;">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php" style="letter-spacing:1px;">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper" style="background-image: url('./login/img/forgetpw-bg-1.jpg');">
		<div class="inner" style="border-radius: 10px;">

			<form action="#" method="POST">
				<h3>Password Recovery</h3>
				<div class="form-wrapper">
					<input type="email" placeholder="Email" class="form-control" name="email" required>
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



	<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
		<div class="container text-center">
			<small style="letter-spacing:1px;">Copyright &copy; E-Veil</small>
		</div>
	</footer>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>