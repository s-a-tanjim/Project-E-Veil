<?php
include 'db_config.php';
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
    header("Location: ../login.php?login=invalid_action");
    exit();
}


$username=substr($_SESSION['email'], 0, -10);

$sql = "UPDATE ".$username." SET bin='1' WHERE from_ = '".$_SESSION['from_']."' AND message='".$_SESSION["message"]."' AND date='".$_SESSION["date"]."' AND mode='".$_SESSION["mode"]."';";
if ($result = mysqli_query($conn, $sql)) {
  //success
  if($_SESSION['inbox']===1){
    $_SESSION['inbox']=0;
    header("Location: ../inbox.php?delete=moved_to_bin");
  }
  elseif($_SESSION['outbox']===1){
    $_SESSION['outbox']=0;
    header("Location: ../outbox.php?delete=moved_to_bin");
  }
  elseif($_SESSION['veilbox']===1){
    $_SESSION['veilbox']=0;
    header("Location: ../veilbox.php?delete=moved_to_bin");
  }
  else{
    header("Location: ../inbox.php?delete=error");
  exit();
  }
  exit();
} else {
  //error
  header("Location: ../inbox.php?delete=database_connection_error");
  exit();
}