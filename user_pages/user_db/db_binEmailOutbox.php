<?php
include 'db_config.php';
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
  header("Location: ../login.php?login=invalid_action");
  exit();
}

$message_id = $_GET['id'];
$username = substr($_SESSION['email'], 0, -10);
$sql = "UPDATE " . $username . " SET bin='1' WHERE id = '" . $message_id . "';";

if ($result = mysqli_query($conn, $sql)) {
  //success
  header("Location: ../outbox.php?delete=moved_to_bin");
  exit();
} else {
  //error
  header("Location: ../outbox.php?delete=database_connection_error");
  exit();
}
