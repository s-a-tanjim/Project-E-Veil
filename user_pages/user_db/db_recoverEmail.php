<?php
include 'db_config.php';
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
  header("Location: ../login.php?login=invalid_action");
  exit();
}


$username = substr($_SESSION['email'], 0, -10);

$sql = "UPDATE " . $username . " SET bin='0' WHERE from_ = '" . $_SESSION['from_'] . "' AND message='" . $_SESSION["message"] . "' AND date='" . $_SESSION["date"] . "' AND mode='" . $_SESSION["mode"] . "';";
if ($result = mysqli_query($conn, $sql)) {
  //success
  header("Location: ../bin.php?recover=successful");
  exit();
} else {
  //error
  header("Location: ../inbox.php?delete=database_connection_error");
  exit();
}
