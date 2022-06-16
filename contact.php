

<?php
  if(isset( $_POST['submit']) && isset( $_POST['name']) &&isset( $_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "MRRbrown@protonmail.com";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
    <style media="screen">
    body {
      align-items: center;
      padding-top: 100px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    p {
      margin-top: 0;
      margin-bottom: 1rem;
      font-size: 1.25rem;
      font-weight: 300;
    }


    </style>
    <div class="contact container col-sm-7">
      <h3 class="h3 text-center"><a href="index.php" class="navbar-brand">RoadsCCTVPlus</a></h3><br>
      <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <p class="text-center w-responsive mx-auto mb-5 lead">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>
      <form method="post">
    <div class="row g-3">
    <div class="col-sm-6">
      <label for="exampleInputEmail1">Full name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="col-sm-6">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <small id="emailHelp" class="form-text text-muted">We'll never share your credentials with anyone else.</small>
    <div class="form-group">
      <label for="exampleInputEmail1">Subject</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="subject" aria-describedby="emailHelp" placeholder="Enter subject">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Enter your message here"></textarea>
  </div>
    <button type="submit" class="btn btn-primary" name="submit" style="margin-top: 40px;">Submit</button>
</div>
  </form>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  <footer class="text-center mt-auto text-black-50" style="padding-top: 5%;">
      <a
       class="btn btn-link btn-floating btn-lg text-dark m-1"
       href="#!"
       role="button"
       data-mdb-ripple-color="dark"
       ><i class="fab fa-facebook-f"></i
     ></a>

     <!-- Twitter -->
     <a
       class="btn btn-link btn-floating btn-lg text-dark m-1"
       href="#!"
       role="button"
       data-mdb-ripple-color="dark"
       ><i class="fab fa-twitter"></i
     ></a>
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>
      <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fa-brands fa-github"></i>
        </a>
    <p>Copyright &copy; 2022 <a href="index.php" class="text-black">RoadesCCTVPlus</a>.</p>
  </footer>

</html>
