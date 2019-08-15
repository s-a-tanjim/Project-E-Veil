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

  <title>Sent email</title>
  <link rel="icon" href="./img/send.png" type="image/icon type">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

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
$sql = "SELECT * FROM " . $username . " WHERE mode='send' AND bin=false";

if ($data = mysqli_query($conn, $sql)) {
  //success
} else {
  die("Connection Failed!");
}
?>

<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Inbox</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>To</th>
                <th>Email</th>
                <th>Received date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>To</th>
                <th>Email</th>
                <th>Received date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              while ($record = mysqli_fetch_array($data)) {
                $_SESSION['from_'] = $record["from_"];
                $_SESSION['message'] = $record["message"];
                $_SESSION['date'] = $record["date"];
                $_SESSION['mode'] = $record["mode"];
                $_SESSION['outbox'] = 1;
                echo  '<tr>
              <td>' . $record["from_"] . '</td>
              <td>' . $record["message"] . '</td>
              <td>' . $record["date"] . '</td>
              <td><a href="user_db/db_binEmail.php"><i class="far fa-trash-alt"></i></a></td>
              </tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated today at <?php echo date("h:i:sa"); ?></div>
    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>