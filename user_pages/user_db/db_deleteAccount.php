<?php
include_once 'db_config.php';
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
  header("Location: ../login.php?login=invalid_action");
  exit();
}

if ($_SESSION['pro_pic'] != "default_user.png") {
  $img_src = "../profile_pic/" . $_SESSION['pro_pic'];
  unlink($img_src) or die("Couldn't delete file");
}
$user_name = substr($_SESSION['email'], 0, -10);
$sql = "DROP TABLE " . $user_name;

if ($result = mysqli_query($conn, $sql)) {  //Email table delete
  //success
  $sql = "DELETE FROM user_info WHERE email = '" . $_SESSION['email'] . "';";
  mysqli_query($conn, $sql);
  session_unset();
  session_destroy();
  header("Location: ../../index.php?successfully_deleted_your_account");
  exit();
} else {
  //error
  header("Location: ../profile.php?delete=database_connection_error");
  exit();
}
