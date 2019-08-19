<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/index.css">
  <link href="user_pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <title>Welcome to E-Veil</title>
  <link rel="icon" href="./img/indexicon.png" type="image/icon type">


  <style media="screen">
    .carousel-item {
    height: 100vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }
  </style>

</head>
<body>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="letter-spacing:2px;"><i class="fas fa-user-secret" style="margin-right:6px;"></i>E - Veil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/mail.png')">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Share Files and Messages</h2>
              <p class="lead">Share your files with your friends</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/encrypt2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Encrypt Your Mail</h2>
              <p class="lead">Use Advanced Encrypted Standard to encrypt your email</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/anonymous.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Hide Your Identity</h2>
              <p class="lead">Send mails anonymously by hiding yourself from internet</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1 class="display-4">Project E-Veil</h1>
        <p class="lead">What does an undercover agent need the most? What if you want to pass a very important information to the authority?
          AES Encrypted email service is the best solution for him.
          And what if revealing your identity can be a life risk for you? Being anonymous maybe a good choice for you.
          Our aim is to create a communication platform where you can share information safely by hiding your identity!
        </p>
      </div>
    </section>


    <div class="parallox" style="background-image: url(./img/parallox1.png);height:400px;"></div>


    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
      <div class="container text-center">
        <small style="letter-spacing:1px;">Copyright &copy; E-Veil</small>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>
