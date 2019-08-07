<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php
  $output = '<html><title>%TITLE%</title><body>';
  ?>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="inbox.php"><i class="fab fa-500px"></i>Email</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="./profile.php">Profile</a>
          <a class="dropdown-item" href="./accountsettings.php">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="compose.php">
              <i class="fas fa-pencil-alt"></i>
              <span>Compose</span></a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="inbox.php">
          <i class="fas fa-envelope"></i>
          <span>Inbox</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="outbox.php">
          <i class="fas fa-paper-plane"></i>
          <span>Sent</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="veilbox.php">
          <i class="fas fa-mask"></i>
          <span>Veilbox</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bin.php">
          <i class="fas fa-trash-alt"></i>
          <span>Bin</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-address-card"></i>
          <span>Account</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="./profile.php">Profile</a>
          <a class="dropdown-item" href="./accountsettings.php">Account Settings</a>
          <a class="dropdown-item" href="../forgetpw.html">Forgot Password</a>
        </div>
      </li>
    </ul>

    <!--Dashboard end-->
