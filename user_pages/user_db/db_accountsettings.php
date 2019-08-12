<?php

if (isset($_POST['update_submit'])) {
  include_once 'db_config.php';
  $table_name = 'user_info';    //The table used in this page

  $flag = 0;

  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $p_number = mysqli_real_escape_string($conn, $_POST['p_number']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
  $pw = mysqli_real_escape_string($conn, $_POST['password']);
  $pic_name = $_FILES['pro_pic']['name'];


  if (!empty($first_name)) {       //-----------------First Name
    $flag = 1;
    if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
      header("Location: ../accountsettings.php?update=invalid_name");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET first_name='" . $first_name . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }

  if (!empty($last_name)) {       //-----------------Last Name
    $flag = 1;
    if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
      header("Location: ../accountsettings.php?update=invalid_name");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET last_name='" . $last_name . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }
  if (!empty($p_number)) {       //-----------------Phone number
    $flag = 1;
    if (!preg_match("/^[0-9]*$/", $p_number)) {
      header("Location: ../accountsettings.php?update=invalid_number");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET p_number='" . $p_number . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }

  if (!empty($city)) {       //-----------------city Name
    $flag = 1;
    if (!preg_match("/^[a-zA-Z]*$/", $city)) {
      header("Location: ../accountsettings.php?update=invalid_city");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET city='" . $city . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }

  if (!empty($country)) {       //-----------------country Name
    $flag = 1;
    if (!preg_match("/^[a-zA-Z]*$/", $country)) {
      header("Location: ../accountsettings.php?update=invalid_country");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET country='" . $country . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }
  if (!empty($postal_code)) {       //-----------------postal code
    $flag = 1;
    if (!preg_match("/^[0-9]*$/", $postal_code)) {
      header("Location: ../accountsettings.php?update=invalid_postal_code");
      exit();
    } else {
      $sql = "UPDATE " . $table_name . " SET postal_code='" . $postal_code . "' WHERE email='" . $_SESSION['email'] . "'";
      if ($result = mysqli_query($conn, $sql)) {
        //success
      } else {
        //error
        header("Location: ../accountsettings.php?update=database_connection_error");
        exit();
      }
    }
  }
  if (!empty($pw)) {       //-----------------Password
    $flag = 1;
    $hashpw = password_hash($pw, PASSWORD_DEFAULT);
    $sql = "UPDATE " . $table_name . " SET pw='" . $hashpw . "' WHERE email='" . $_SESSION['email'] . "'";
    if ($result = mysqli_query($conn, $sql)) {
      //success
    } else {
      //error
      header("Location: ../accountsettings.php?update=database_connection_error");
      exit();
    }
  }

  if (!empty($pic_name)) {       //----------------- Profile Picture
    $flag = 1;
    $pic_error = $_FILES['pro_pic']['error'];
    $pic_tmp_name = $_FILES['pro_pic']['tmp_name'];
    $pic_size = $_FILES['pro_pic']['size'];
    $pic_type = $_FILES['pro_pic']['type'];

    $pic_ext = explode('.', $pic_name);  //get pic name array

    $pic_ext = strtolower(end($pic_ext));  //getting pic extention and make lowercase

    $valid_pic = array('jpg', 'jpeg', 'png');  //acceptable image type


    if (in_array($pic_ext, $valid_pic)) {  //Check valid type
      if ($pic_error === 0) {
        if ($pic_size < 1000000) {
          $pic_name_new = $_SESSION['email'] . "." . $pic_ext; //new pic name
          $pic_destination = '../profile_pic/' . $pic_name_new;

          move_uploaded_file($pic_tmp_name, $pic_destination);
          $sql = "UPDATE " . $table_name . " SET pro_pic='" . $pic_name_new . "' WHERE email='" . $_SESSION['email'] . "'";
          if ($result = mysqli_query($conn, $sql)) {
            //success
          } else {
            //error
            header("Location: ../accountsettings.php?update=database_connection_error");
            exit();
          }
        } else {
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
  }

  if ($flag == 0) {
    header("Location: ../accountsettings.php?upload=empty_field");
    exit();
  } else {
    header("Location: ../accountsettings.php?upload=successful");
    exit();
  }
} else {
  header("Location: ../../login.php?login=invalid_action");
  exit();
}
