<?php
include_once 'db_config.php';
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
  header("Location: ../login.php?login=invalid_action");
  exit();
}

if($_SESSION['pro_pic']!="default_user.png"){
  $img_src="../profile_pic/".$_SESSION['pro_pic'];
  //unlink($myFile) or die("Couldn't delete file");
  echo "img found at : ".$img_src;
}



