<?php

  if(isset($_POST['login_submit'])){

  include_once 'db_config.php';


  $email = mysqli_real_escape_string( $conn , $_POST['email']);
  $pw =  mysqli_real_escape_string( $conn , $_POST['password']);

  $table_name = 'user_info';    //The table used in this page

  //Error Handle

  //Check empty fiends

  //check if inputs are empty
  if(empty($email) || empty($pw)){
    header("Location: ../login.php?login=empty");
    exit();
  }
  else {
    $sql="SELECT * FROM $table_name WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
      header("Location: ../login.php?login=username_Not_Found");
      exit();
    }
    else {
      if($row = mysqli_fetch_assoc($result)){
        //de-hashing pw
        $hashedpwcheck=password_verify($pw,$row['pw']);
        if($hashedpwcheck==false){
          header("Location: ../login.php?login=wrong_password");
          exit();
        }
        elseif($hashedpwcheck==true){
          // logged in user account
          //Storing data  in session from database
          $_SESSION['email']=$row['email'];
          $_SESSION['first_name']=$row['first_name'];
          $_SESSION['last_name']=$row['last_name'];
          $_SESSION['creation_date']=$row['creation_date'];
          $_SESSION['pro_pic']=$row['pro_pic'];
          $_SESSION['p_number']=$row['p_number'];
          $_SESSION['country']=$row['country'];
          $_SESSION['city']=$row['city'];
          $_SESSION['postal_code']=$row['postal_code'];
          
          header("Location: ../user_pages/inbox.php?login=LoginSuccess");
          exit();
        }
        else{
          header("Location: ../user_pages/inbox.php?login=not_success");
          exit();
        }
      }
    }
  }
} else {
  header("Location: ../login.php?login=invalid_action");
  exit();
}
