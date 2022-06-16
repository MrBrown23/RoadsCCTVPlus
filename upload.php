<?php
include("connection.php");
include("functions.php");
  if (isset($_GET["addVideo"])) {
    echo "mlaha";
    if(isset($_POST['submit'])){
      $file = $_FILES['my_video'];
      $file_name = $_FILES['my_video']['name'];
      $file_tmp_name = $_FILES['my_video']['tmp_name'];
      $file_size = $_FILES['my_video']['size'];
      $file_error = $_FILES['my_video']['error'];
      $file_type = $_FILES['my_video']['type'];
      $file_ext = explode(".",$file_name);
      $file_real_ext = strtolower(end($file_ext));
      if($file_error === 0){
        session_start();
        $video_ex = pathinfo($file_name,PATHINFO_EXTENSION);
        $video_ex_lc = strtolower($video_ex);
        $allowed_ex = array('mp4', 'webm', 'avi', 'flv');
        if (in_array($video_ex_lc,$allowed_ex)) {
          echo "awesome";
          $new_video_name = uniqid("video-",true).'.'.$video_ex_lc;
          $video_upload_path = 'videos/'.$new_video_name;
          move_uploaded_file($file_tmp_name,$video_upload_path);

          $_SESSION["message"] = "Video uploaded";
          $_SESSION["msg_type"] = "success";
          $id_supplier=$_GET["addVideo"];
          $title=$_POST['title'];
          $description=$_POST['description'];
          $keywords=$_POST['keywords'];
          $is_private='0';
          insert_video($connection,$id_supplier,$title,$description,$keywords,$is_private,$video_upload_path);
          header("Location: mainpage.php?success=$em");
        }
        else {
          $em = "";
          $_SESSION["message"] = "This is not a video!";
          $_SESSION["msg_type"] = "danger";
          header("Location: mainpage.php?error=$em");

        }
    }

    }




  }
 ?>
