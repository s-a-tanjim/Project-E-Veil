<?php

  $server_name = "localhost";
  $server_password = "";
  $server_username = "root";
  $db_name = "project_eveil";

  $conn = mysqli_connect ( $server_name , $server_username , $server_password , $db_name );

  if( $conn->connect_error ){
    die("Connection Failed!");
    exit();
  }
  
