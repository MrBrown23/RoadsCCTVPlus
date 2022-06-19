<?php

  function add_new_user($connection,$email,$password,$username,$name,$f_name,$user_message){
    $password=hash("sha256",$password);
    $query="insert into users (email,password,username,f_name,l_name,message) values ('$email','$password','$username','$name','$f_name','$user_message')";
    mysqli_query($connection,$query);
  }


  function check_user($connection,$email,$username,$password){
    $password=hash("sha256",$password);
    $query="select * from suppliers where (email = '$email' or username = '$username') and password = '$password'";
    $result = mysqli_query($connection,$query);
    if($result && mysqli_num_rows($result) > 0){
      $user_data=mysqli_fetch_assoc($result);
      $_SESSION["user_id"] = $user_data["id"];
      $_SESSION["is_admin"] = $user_data["is_admin"];
      if ($user_data["is_admin"]) {
        header("Location: admin.php");
      }
      else {
        header("Location: mainpage.php");
      }

      die();
    }
  }


  function dublicate($connection,$email,$username){
    $query1 = "select * from users where email = '$email'";
    $query2="select * from users where username = '$username'";

    $result1 = mysqli_query($connection,$query1);
    $result2 = mysqli_query($connection,$query1);

    if($result1 && mysqli_num_rows($result1) > 0 && $result2 && mysqli_num_rows($result2) > 0){
      return false;
      die();
    }
    else {
      return true;
    }

  }


function delete_user($connection,$id,$is_supplier){
  echo "sss";
  $query = "delete from users where id=$id;";
  echo $id;
  mysqli_query($connection,$query);
  if(!$is_supplier){
    $_SESSION["message"] = "Subscription was declined";
    $_SESSION["msg_type"] = "danger";
    header("Location: admin.php");
  }

}

  function add_supplier($connection,$id){
    $query = "select * from users where id=$id;";
    $result = mysqli_query($connection,$query);
    if($result && mysqli_num_rows($result) > 0){
      $user_data = mysqli_fetch_assoc($result);
      $email=$user_data["email"];
      $password=$user_data["password"];
      $username=$user_data["username"];
      $name=$user_data["f_name"];
      $f_name=$user_data["l_name"];
      $query = "insert into suppliers (email,password,username,f_name,l_name) values ('$email','$password','$username','$name','$f_name')";
      mysqli_query($connection,$query);
      delete_user($connection,$id,1);
      $_SESSION["message"] = "Supplier has been added";
      $_SESSION["msg_type"] = "success";
      header("Location: admin.php");
      die();
    }
  }

  function delete_supplier($connection,$id){
    $query = "delete from suppliers where id=$id;";
    mysqli_query($connection,$query);
    $_SESSION["message"] = "Supplier has been deleted!";
    $_SESSION["msg_type"] = "danger";
    header("Location: admin.php");
    die();
  }


  function delete_video($connection,$id){
    $query = "delete from videos where id=$id;";
    mysqli_query($connection,$query);
    $query2 = "select is_admin from suppliers where id=$id;";
    $result = mysqli_query($connection,$query2);
    $_SESSION["message"] = "Video deleted";
    $_SESSION["msg_type"] = "danger";
    if($result){
      header("Location: admin.php");
    }
    else {
      header("Location: mainpage.php");
    }
  }

  function insert_video($connection,$id_supplier,$title,$description,$keywords,$is_private,$video){
    echo "string";
    $query ="insert into `videos` (`id_supplier`, `title`, `description`, `keywords`, `is_private`, `video`) values ('$id_supplier', '$title', '$description', '$keywords', '$is_private','$video');";
     mysqli_query($connection,$query);
  }

  function update_supplier($connection,$id,$f_name,$l_name,$username,$eamil,$password){
      $query = "update suppliers set email=$email, password=$password, username=$username, f_name=$f_name, l_name=$l_name, where id='$id'";
      mysqli_query($connection,$query);
      delete_user($connection,$id,1);
      $_SESSION["message"] = "Supplier has been updated";
      $_SESSION["msg_type"] = "success";
      header("Location: admin.php");
      die();
}

 ?>
