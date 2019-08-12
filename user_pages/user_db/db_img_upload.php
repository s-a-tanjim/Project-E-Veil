<?php
include_once 'db_config.php';
  if (isset($_POST['update_submit'])) {
    $table_name = 'user_info';    //The table used in this page
  
    
    $pic_name = $_FILES['pic']['name'];
    $pic_error = $_FILES['pic']['error'];
    $pic_tmp_name=$_FILES['pic']['tmp_name'];
    $pic_size=$_FILES['pic']['size'];
    $pic_type=$_FILES['pic']['type'];
    
    $pic_ext = explode('.', $pic_name);  //get pic name array
  
    $pic_ext = strtolower(end($pic_ext));  //getting pic extention
    
    $valid_pic = array('jpg', 'jpeg', 'png');  //acceptable image type
  

      if (in_array($pic_ext, $valid_pic)) {  //Check valid type
        if ($pic_error === 0) {
  
          if($pic_size<1000000){
            
            $pic_name_new=$_SESSION['email'].".".$pic_ext; //new pic name

            $pic_destination = '../profile_pic/'.$pic_name_new;

            move_uploaded_file($pic_tmp_name,$pic_destination);
            $sql="UPDATE ".$table_name." SET pro_pic='".$pic_name_new."' WHERE email='".$_SESSION[email]."'";
            $result=mysqli_query($conn,$sql);
            
            header("Location: ../accountsettings.php?uploadSucccess");
          }
          else{
            header("Location: ../accountsettings.php?upload=too_large_file");
            exit();
          }
        } else {
          header("Location: ../accountsettings.php?upload=error");
          exit();
        }
      } else {
        header("Location: ../accountsettings.php?upload=invalid_image_type");
        exit();
      }
    
  } else {
    header("Location: ../../login.php?login=invalid_action");
    exit();
  }
  