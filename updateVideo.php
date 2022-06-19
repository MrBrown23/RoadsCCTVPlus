<?php
include("connection.php");
include("functions.php");
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if (isset($_GET["edit"])) {
  $id = $_GET["edit"];
  $query = "select * from videos where id=$id;";
  $result = mysqli_query($connection,$query);
  $details = mysqli_fetch_array($result);

}
if(isset($_POST["submit"])){
  // echo "string";
  $id = $_POST["edit"];
  if (isset($_POST["title"])) {
    $title = $_POST['title'];
    $query_new = "UPDATE videos SET title = '$title' WHERE id = $id; ";
    mysqli_query($connection, $query_new);
  }
  if (isset($_POST["description"])) {
    $description = $_POST['description'];
    $query_new = "UPDATE videos SET description = '$description' WHERE id = $id; ";
    mysqli_query($connection, $query_new);
  }
  if (isset($_POST["keywords"])) {
    $keywords = $_POST['keywords'];
    $query_new = "UPDATE videos SET keywords = '$keywords' WHERE id = $id; ";
    mysqli_query($connection, $query_new);
  }

  header("Location: mainpage.php");

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
    <p class="text-center w-responsive mx-auto mb-5 lead">Be careful when you modify videos details.</p>
      <form action="updateVideo.php" method="post">
        <input type="text" name="edit" value="<?php echo $details['id']; ?>" hidden>
    <div class="row g-3">
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="<?php echo $details['title']; ?>">
      </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Keywords</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="keywords" aria-describedby="emailHelp" value="<?php echo $details['keywords']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="description" aria-describedby="emailHelp" value="<?php echo $details['description'];?>">
    </div>


    <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 40px;">Update</button>
</div>
  </form>
    </div>


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
          href="https://github.com/MrBrown23/RoadsCCTVPlus"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fa-brands fa-github"></i>
        </a>
    <p>Copyright &copy; 2022 <a href="index.php" class="text-black">RoadesCCTVPlus</a>.</p>
  </footer>

</html>
