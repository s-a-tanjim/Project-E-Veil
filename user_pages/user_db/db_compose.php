<?php
session_start();

if (isset($_POST['send'])) {      //For Send

  $to_user = $_POST['to_user'];
  $message = $_POST['message'];

  $server_name = "localhost";
  $server_password = "";
  $server_username = "root";
  $db_name = "project_eveil";
  $table_name = "user_info";
  $conn = mysqli_connect($server_name, $server_username, $server_password, $db_name);

  if ($conn->connect_error) {
    die("Connection Failed!");
    exit();
  } else {
    $sql = "SELECT * FROM " . $table_name . " WHERE email='" . $to_user . "';";
    if ($result = mysqli_query($conn, $sql)) {
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        //ready to send email
        $to_user_name = substr($to_user, 0, -10);
        $sql = "INSERT INTO " . $to_user_name . " (from_,message,date,mode,bin) VALUE ('" . $_SESSION['email'] . "',AES_ENCRYPT('".$message."', 'eveil') ,now(),'receive','0')"; //Store in receiver table
        if ($result = mysqli_query($conn, $sql)) {
          $sql = "SELECT received_mail_count FROM user_info WHERE email = '".$to_user."' LIMIT 1";
          $res=mysqli_query($conn, $sql);  //Get Received mail count number
          $value = mysqli_fetch_array($res);
          $received_mail=$value['received_mail_count']+1;
          $sql="UPDATE user_info SET received_mail_count='".$received_mail."' WHERE email='".$to_user."';";
          mysqli_query($conn, $sql);  //Update Received mail count number

          $user = substr($_SESSION['email'], 0, -10);
          $sql = "INSERT INTO " . $user . " (from_,message,date,mode,bin) VALUE ('" . $to_user . "', AES_ENCRYPT('".$message."', 'eveil') ,now(),'send','0')"; //Store in own table
          if ($result = mysqli_query($conn, $sql)) {
            $_SESSION['sent_mail_count']=$_SESSION['sent_mail_count']+1;
            $sql="UPDATE user_info SET sent_mail_count='".$_SESSION['sent_mail_count']."' WHERE email='".$_SESSION['email']."';";
            mysqli_query($conn, $sql);
            header("Location: ../compose.php?compose=SentSuccessfully");
            exit();
          } else {
            header("Location: ../compose.php?compose=database_connection_error");
            exit();
          }
        } else {
          header("Location: ../compose.php?compose=database_connection_error");
          exit();
        }
      } else {
        header("Location: ../compose.php?compose=invalid_user_email");
        exit();
      }
    } else {
      //error
      header("Location: ../compose.php?compose=database_connection_error");
      exit();
    }
  }
} elseif (isset($_POST['send_anonymous'])) {  //-----------For Anonymously send!


  $to_user = $_POST['to_user'];
  $message = $_POST['message'];

  $server_name = "localhost";
  $server_password = "";
  $server_username = "root";
  $db_name = "project_eveil";
  $table_name = "user_info";
  $conn = mysqli_connect($server_name, $server_username, $server_password, $db_name);

  if ($conn->connect_error) {
    die("Connection Failed!");
    exit();
  } else {
    $sql = "SELECT * FROM " . $table_name . " WHERE email='" . $to_user . "';";
    if ($result = mysqli_query($conn, $sql)) {
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        //ready to send email
        $to_user_name = substr($to_user, 0, -10);
        $sql = "INSERT INTO " . $to_user_name . " (from_,message,date,mode,bin) VALUE ('anonymous@eveil.com', AES_ENCRYPT('".$message."', 'eveil') ,now(),'anonymous','0')"; //Store in receiver table
        if ($result = mysqli_query($conn, $sql)) {
          $sql = "SELECT received_mail_count FROM user_info WHERE email = '".$to_user."' LIMIT 1";
          $res=mysqli_query($conn, $sql);  //Get Received mail count number
          $value = mysqli_fetch_array($res);
          $received_mail=$value['received_mail_count']+1;
          $sql="UPDATE user_info SET received_mail_count='".$received_mail."' WHERE email='".$to_user."';";
          mysqli_query($conn, $sql);  //Update Received mail count number

          $user = substr($_SESSION['email'], 0, -10);
          $sql = "INSERT INTO " . $user . " (from_,message,date,mode,bin) VALUE ('" . $to_user . "', AES_ENCRYPT('".$message."', 'eveil') ,now(),'send','0')"; //Store in own table
          if ($result = mysqli_query($conn, $sql)) {
            $_SESSION['sent_mail_count']=$_SESSION['sent_mail_count']+1;
            $sql="UPDATE user_info SET sent_mail_count='".$_SESSION['sent_mail_count']."' WHERE email='".$_SESSION['email']."';";
            mysqli_query($conn, $sql);  //Update sent mail count number
            header("Location: ../compose.php?compose=SentSuccessfully");
            exit();
          } else {
            header("Location: ../compose.php?compose=database_connection_error");
            exit();
          }
        } else {
          header("Location: ../compose.php?compose=database_connection_error");
          exit();
        }
      } else {
        header("Location: ../compose.php?compose=invalid_user_email");
        exit();
      }
    } else {
      //error
      header("Location: ../compose.php?compose=database_connection_error");
      exit();
    }
  }
} else {
  header("Location: ../../login.php?login=invalid_action");
  exit();
}
