<?php
  session_start();
  if(isset($_SESSION["user_id"])){
    if($_SESSION["is_admin"])
      header("Location: admin.php");
    else
      header("Location: mainpage.php");
}
 ?>
