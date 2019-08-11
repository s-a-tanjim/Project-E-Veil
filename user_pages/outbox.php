<?php
include_once 'header.php';
$title = "Sent email";
$output = str_replace('%TITLE%', $title, $output);

echo $output; //Outout in title

$server_name = "localhost";
$server_password = "";
$server_username = "root";
$db_name = "test";

//$table_name="email_table";

$conn = mysqli_connect ( $server_name , $server_username , $server_password , $db_name );

if( $conn->connect_error ){
  die("Connection Failed!");
}

//mysql_select_db($tabe_name,$conn);

$sql="SELECT * FROM email_table WHERE mode='send'";

$data=mysqli_query($conn,$sql);
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
          while($record=mysqli_fetch_array($data)){
            echo  '<tr>
              <td>'. $record["from_"] .'</td>
              <td>'. $record["message"] .'</td>
              <td>'. $record["date"] .'</td>
              <td>'. $record["mode"] .'</td>
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
