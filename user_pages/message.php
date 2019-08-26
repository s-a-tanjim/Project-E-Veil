<?php
session_start();
if (isset($_SESSION['email']) == false) {   //Checking Session['email'] is set or not
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

  <title>Message</title>
  <link rel="icon" href="./img/inbox.png" type="image/icon type">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- For Modal -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style>
    .main {
      margin: 5% 4%;
      width: 100%;
    }

    .from {
      width: 100%;
      padding: 5px 10px;
      border: 1px solid black;
      font-size: 20px;
    }

    .message {
      width: 100%;
      padding: 5px 10px;
      border: 1px solid black;
      margin-top: 25px;
    }
  </style>

</head>
<?php
include_once 'header.php';


$server_name = "localhost";
$server_password = "";
$server_username = "root";
$db_name = "project_eveil";

//$table_name="email_table";

$conn = mysqli_connect($server_name, $server_username, $server_password, $db_name);

if ($conn->connect_error) {
  die("Connection Failed!");
}

//mysql_select_db($tabe_name,$conn);
$username = $_SESSION['email'];
$username = substr($username, 0, -10);
$message_id = $_GET['id'];
$sql = "SELECT AES_DECRYPT(message,'eveil'),from_,date FROM " . $username . " WHERE id=" . $message_id . ";";

if ($data = mysqli_query($conn, $sql)) {
  //success
  $sql = "UPDATE " . $username . " SET seen='1' WHERE id='" . $message_id . "';";
  mysqli_query($conn, $sql);    //Make email as read
  $record = mysqli_fetch_array($data);
  $message = $record["AES_DECRYPT(message,'eveil')"];
  $sql = "SELECT pro_pic FROM user_info WHERE email='" . $record['from_'] . "';";
  if ($data = mysqli_query($conn, $sql)) {
    $record_of_from_ = mysqli_fetch_array($data);
    $from_pro_pic = "profile_pic/" . $record_of_from_['pro_pic'];
  } else {
    $from_pro_pic = "profile_pic/default_user.png";
  }
} else {
  die("Connection Failed!");
}
?>


<div class="main">
  <div class="from">
    <?php if ($_GET['prev_page'] === 'index' || $_GET['prev_page'] === 'veilbox') {
      echo 'From: ';
    } else {
      echo 'To: ';
    } ?><img src="<?php echo $from_pro_pic; ?>" width="20px" height="20px" style="border-radius:50%;"> <?php echo $record['from_']; ?>
  </div>
  <div class="message">
    <p style="font-size:20px;">Message:</p>
    <p><?php echo $message; ?> </p>
  </div>

</div>



<?php
include_once 'footer.php';
?>