<?php
session_start();
if(isset($_SESSION['email'])==false){   //Checking Session['email'] is set or not
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
  
  <title>Edit your account</title>
  <link rel="icon" href="./img/settings.png" type="image/icon type">
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<?php
include_once 'header.php';
?>


<div class="content" style="margin-left:1%;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">

            <form action="./user_db/db_accountsettings.php" method="POST" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    <input type="email" class="form-control" placeholder=<?php echo "$_SESSION[email]"; ?> disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">First Name</label>
                    <input type="text" placeholder=<?php echo "$_SESSION[first_name]"; ?> name="first_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Last Name</label>
                    <input type="text" placeholder=<?php echo "$_SESSION[last_name]"; ?> name="last_name" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mobile Number</label>
                    <input type="text" placeholder=<?php echo "$_SESSION[p_number]"; ?> name="p_number" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">City</label>
                    <input type="text" placeholder=<?php if(is_null($_SESSION['city'])){echo "n/a";}else{  echo "$_SESSION[city]";} ?> name="city" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Country</label>
                    <input type="text"placeholder=<?php if(is_null($_SESSION['country'])){echo "n/a";}else{  echo "$_SESSION[country]";} ?> name="country" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Postal Code</label>
                    <input type="text" placeholder=<?php if(is_null($_SESSION['postal_code'])){echo "n/a";}else{  echo "$_SESSION[postal_code]";} ?> name="postal_code" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Upload Profile Picture</label><br>
                    <input class="form-group" type="file" name="pro_pic" accept="image/*">
                  </div>
                </div>
              </div>
              <button name="update_submit" type="submit" class="btn btn-primary pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
            <script>
            var password = document.getElementById("password") , confirm_password = document.getElementById("confirm_password");
            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
          </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-2" style="float:right;">
  <div class="card card-profile">
    <div class="card-avatar">
      <?php
      $pic_src = './profile_pic/' . $_SESSION['pro_pic'];
      echo '<img class="img" src="' . $pic_src . '" alt="pro_pic" height="100%" width="100%">';
      ?>

    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>