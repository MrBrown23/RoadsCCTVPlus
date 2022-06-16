<?php
include("connection.php");
include("functions.php");
session_start();
if (isset($_GET["edit"])) {
  $id = $_GET["edit"];
  $query = "select * from suppliers where id=$id;";
  $result = mysqli_query($connection,$query);
  $details = mysqli_fetch_array($result);

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
      <h2 class="h1-responsive font-weight-bold text-center my-4">Edit user</h2>
    <p class="text-center w-responsive mx-auto mb-5 lead">Be careful when you modify suppliers credentials.</p>
      <form action="update.php" method="post">
        <input type="text" name="" value="<?php echo $details['id']; ?>" hidden>
    <div class="row g-3">
    <div class="col-sm-6">
      <label for="exampleInputEmail1">First name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="f_name" value="<?php echo $details['f_name']; ?>">
    </div>
    <div class="col-sm-6">
      <label for="exampleInputEmail1">Last name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="l_name" aria-describedby="emailHelp" value="<?php echo $details['l_name']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" value="<?php echo $details['username']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $details['email']; ?>">
    </div>


    <button type="submit" name="submit" class="btn btn-primary"style="margin-top: 40px;">Update</button>
</div>
  </form>
    </div>

    <?php
    if(isset($_POST["update"])){

      $f_name = $_POST['f_name'];
      $l_name = $_POST['l_name'];
      $username =  $_POST['username'];
      $eamil = $_POST['eamil'];
    }
     ?>

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
