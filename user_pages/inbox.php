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

  <title>E-Veil</title>
  <link rel="icon" href="./img/inbox.png" type="image/icon type">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- For Modal -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
$sql = "SELECT AES_DECRYPT(message,'eveil'),from_,id,date FROM " . $username . " WHERE mode='receive' AND bin=false";

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
                <th>From</th>
                <th>Email</th>
                <th>Received date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>From</th>
                <th>Email</th>
                <th>Received date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              while ($record = mysqli_fetch_array($data)) {
                echo  '<tr>
              <td>' . $record["from_"] . '</td>
              <td><a style="color:black;cursor:default;" href="message.php?id='.$record["id"].'">' . $record["AES_DECRYPT(message,'eveil')"] . '</a></td>
              <td>' . $record["date"] . '</td>
              <td><a href="user_db/db_binEmailinbox.php?id=' . $record["id"] . '"><i class="far fa-trash-alt"></i></a></td>
            </tr>';
              } //<td> <div onclick="'."document.getElementById('detailsEmail').style.display='block'".'">'. $record["message"] .'</div></td>
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated today at <?php echo date("h:i:sa"); ?></div>
    </div>
  </div>
</div>
<!-- Modal -->
<!--<div id="detailsEmail" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('detailsEmail').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <p><?php //echo $record["message"]; 
            ?></p>
        
      </div>
      <footer class="w3-container w3-teal">
        <p><?php //echo $_SESSION["date"]; 
            ?></p>
      </footer>
    </div>
  </div>
-->

<?php
include_once 'footer.php';
?>