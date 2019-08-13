<?php
session_start();
if(isset($_SESSION['email'])==false){   //Checking Session['email'] is set or not
  header("Location: ../login.php?login=invalid_action");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>404 Error</title>
  <link rel="icon" href="./img/error-404.png" type="image/icon type">
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<?php
include_once 'header.php';

?>

<img src="../img/404.gif"  width="70%">

<?php
  include_once 'footer.php';
?>

