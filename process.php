<?php
session_start();
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
    $_SESSION["message"] = "Video deleted";
    $_SESSION["msg_type"] = "danger";
    exit(0);
  }



if(isset($_GET["logout"])){
  session_start();
  session_unset();
  session_destroy();
  header("Location: login.php");
}
 ?>
