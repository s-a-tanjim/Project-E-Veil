<?php

  if(isset($_POST['signup_submit'])){

    include_once 'db_config.php';

    $first_name = mysqli_real_escape_string( $conn , $_POST['first_name']);
    $last_name = mysqli_real_escape_string( $conn , $_POST['last_name']);
    $email = mysqli_real_escape_string( $conn , $_POST['email']);
    $email = $email."@eveil.com";    // Concat username and @eveil.com
    $pw =  mysqli_real_escape_string( $conn , $_POST['password']);
    $phone = mysqli_real_escape_string( $conn , $_POST['phone_number']);

    $table_name = 'user_info';    //The table used in this page

    //Error Handle

    //Check empty fiends

    if( empty( $first_name ) || empty( $last_name ) || empty( $email ) || empty( $pw ) || empty( $phone ) ){
      header("Location: ../signup.php?Signup=Empty");
      exit();
    }
    else{
      if(!preg_match("/^[a-zA-Z]*$/",$first_name) || !preg_match("/^[a-zA-Z]*$/",$last_name)){
        header("Location: ../signup.php?Signup=invalid_name");
        exit();
      }
      else{
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          header("Location: ../signup.php?Signup=invalid_email");
          exit();
        }
        else{
          $sql= "SELECT * FROM $table_name WHERE email ='$email'";
          $result=mysqli_query($conn, $sql);
          $resultCheck=mysqli_num_rows($result);
          
          //header("Location: ../signup.php?Signup=$resultCheck");
          //exit();

          if($resultCheck>0){
            header("Location: ../signup.php?Signup=this_email_is_already_exist");
            exit();
          }
          else{
            //Hashing password
            $hashpw = password_hash($pw,PASSWORD_DEFAULT);
            //insert user into database
            $sql="INSERT INTO $table_name ( first_name , last_name , email , pw , p_number ,creation_date ) VALUES ( '$first_name','$last_name','$email','$hashpw','$phone',now())";
            mysqli_query($conn,$sql);
            
            
            header("Location: ../login.php?Signup=success");
            exit();
          }
        }
      }
    }

    //$sql = "INSERT Into user_info ( first_name , last_name , email , password , p_number ,creation_date ) values( '$_POST[first_name]' , '$_POST[last_name]' , '$mail_address' , '$_POST[password]' , '$_POST[p_number]', now());";
  
  $conn->close();
  }
  else{
    header("Location: ../signup.php?=invalid_action");
    exit();
  }
  
?>