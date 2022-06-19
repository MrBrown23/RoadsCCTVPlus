<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
  include("connection.php");
  include("functions.php");
  if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    echo "string";
    delete_user($connection,$id,0);

  }

  if (isset($_GET["accept"])) {

    $id = $_GET["accept"];
    add_supplier($connection,$id);
}

  if(isset($_GET["deleteSupplier"])){
    $id = $_GET["deleteSupplier"];
    delete_supplier($connection,$id);
  }

  if (isset($_GET["deleteVideo"])) {
    $id = $_GET["deleteVideo"];
    delete_video($connection,$id);

  }
  if(isset($_GET["acceptVideo"])){
    $id = $_GET["acceptVideo"];
    $query = "UPDATE videos SET validated = '1' WHERE id = $id;";
    mysqli_query($connection,$query);
    header("Location: admin.php");
  }



if(isset($_GET["logout"])){
  session_start();
  session_unset();
  session_destroy();
  header("Location: login.php");
}
 ?>
