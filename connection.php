<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db_name = "cctv_plus_db";
  $connection = mysqli_connect($host,$user,$pass,$db_name);
  if (!$connection) {
    die("Connection failed");
  }
 ?>
