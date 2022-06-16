<?php
  require_once('PHPMailer/')
  if(isset( $_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "raslan145@protonmail.com";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
    echo "Email sent!";
  }

?>
