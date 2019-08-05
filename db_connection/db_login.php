<?php

  if(isset($_POST['login_submit'])){

    include_once 'db_config.php';


    $email = mysqli_real_escape_string( $conn , $_POST['email']);
    $pw =  mysqli_real_escape_string( $conn , $_POST['password']);

    $table_name = 'user_info';    //The table used in this page

    //Error Handle

    //Check empty fiends

    if( empty( $email ) || empty( $pw ) ){
      header("Location: ../signup.html?Signup=EmptyField");
      exit();
    }
    else{
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.html?Signup=invalid_email");
        exit();
      }
      else{
        //$sql= "SELECT * FROM $table_name WHERE email ='$email'";
        //$result=mysqli_query($conn, $sql);
        //$resultCheck=mysqli_num_rows($result);
        

        //Hashing password
        //$hashpw = password_hash($pw,PASSWORD_DEFAULT);
        //insert user into database
        //$sql="INSERT INTO $table_name ( first_name , last_name , email , pw , p_number ,creation_date ) VALUES ( '$first_name ',' $last_name ',' $email ',' $hashpw ',' $phone ', now() )";
        //mysqli_query($conn,$sql);
        
        
        header("Location: ../login.html?Signup=success");
        exit();
        
      }
    }

    //$sql = "INSERT Into user_info ( first_name , last_name , email , password , p_number ,creation_date ) values( '$_POST[first_name]' , '$_POST[last_name]' , '$mail_address' , '$_POST[password]' , '$_POST[p_number]', now());";
  
  $conn->close();
  }
  else{
    header("Location: ../login.html?=Failed");
    exit();
  }
  
?>