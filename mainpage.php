<?php
include("connection.php");
include("functions.php");
session_start();
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

if(!isset($_SESSION["user_id"])){
  header("Location: login.php");
}
else {
  if ($_SESSION["is_admin"]){
    header("Location: admin.php");
}
else {

  if(isset($_POST["submit"]) && isset($_FILES["my_video"])){
    print_r($_FILES["my_video"]);
    $name = $_FILES["my_video"]["name"];
    $tmp_name = $_FILES["my_video"]["tmp_name"];
    $size = $_FILES["my_video"]["size"];
    $error = $_FILES["my_video"]["error"];
    if($error == 0){
      $video_ex = pathinfo($name, PATHINFO_EXTENSION);
      echo $video_ex;
    }
  }
  if(isset($_GET['submit-search'])){
    $search = mysqli_real_escape_string($connection,$_GET["searchTxt"]);
    $words = explode(" ", $search);
    $query_video = "select * from videos where `title` like '%$search%' or `description` like '%$search%' or `keywords` like '%$search%' ";
    foreach ($words as $word) {
      $query_video .= "or `title` like '%$word%' or `description` like '%$word%' or `keywords` like '%$word%'";
    }
    $query_video .= "order by `videos`.`adding_date` desc;";

    $query_run_s = mysqli_query($connection, $query_video);
    if(mysqli_num_rows($query_run_s) == 0){
      $_SESSION["message"] = "No video was found!";
      $_SESSION["msg_type"] = "danger";
    }

  }
  else {
    $query_video = "select * from videos order by `videos`.`adding_date` desc;";
    $query_run_s = mysqli_query($connection, $query_video);
  }
}

}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Account</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/offcanvas-navbar/">

  <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/mainpage.css" rel="stylesheet">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/themes.css">
  <link rel="stylesheet" href="css/uploadvis.css">
  <link href="css/videos.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-teal-800" aria-label="Main navigation">
    <div class="container-fluid">
      <h3 class="float-md-start mb-0"><a href="mainpage.html" class="navbar-brand">RoadsCCTVPlus</a></h3>
      <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" id="editPage" onclick="goToEdit();" href="#">Edit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="insertPage" onclick="goToInsert();" href="#">Insert</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="watchPage" onclick="goToWatch();" href="#">Watch</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="process.php?logout=<?php $_SESSION["user_id"]; ?>">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="get">
          <input class="form-control me-2" type="search" name="searchTxt" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" name="submit-search" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php if (isset($_SESSION["message"])){ ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show" role="alert">
  <strong><h3 class="alert-heading"><?php echo $_SESSION['message'];

    ?></h3></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
            <?php
                unset($_SESSION['message']);?>

  <?php
  }
  ?>


  <div class="ubody" id="dragAndDrop" hidden>
    <div class="drag-area">
      <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
      <header>Choose a video and fill the form</header>


      <!-- =============================================================FORM ==============================================================-->

      <?php if(isset($_GET["error"])) {?>
      <p><?=$_GET['error']?></p>
      <?php } ?>
      <form action="upload.php?addVideo=<?php echo $_SESSION["user_id"]; ?>" name="videoForm" method="post" enctype="multipart/form-data">
        <input class="form-control form-control-lg" type="file" name="my_video" required>
        <div class="form-floating">
          <textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="1" required></textarea>
          <label for="exampleFormControlTextarea1" class="form-label">Title</label>
        </div>
        <div class="form-floating">

          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="2" required></textarea>
          <label for="floatingInput" class="form-label">Description</label>
        </div>
        <div class="form-floating">
          <textarea class="form-control" id="exampleFormControlTextarea1" name="keywords" rows="1" required></textarea>
          <label or="floatingInput" class="form-label">Keywords</label>
        </div>
        <input class="form-control form-control-lg" type="submit" name="submit" value="UPLOAD" >
      </form>
      <!-- =============================================================FORM ==============================================================-->

    </div>
  </div>
  <div class="">

  </div>
  <div class="board" id="editTable">
    <table width="100%">
      <thead class="text-secondary">
        <tr>
          <td>Video</td>
          <td>Title</td>
          <td>Discription</td>
          <td>Keywords</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php

        $query = "select * from videos;";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($query_run)) {
          if($row["id_supplier"]!=$_SESSION["user_id"]){
            continue;
          }
          if ($row["validated"]) {
            continue;
          }

         ?>
        <tr>
          <td>
            <video src="<?php echo $row["video"]; ?>" height="100" width="200" poster="posterimage.jpg" muted controls>
            </video>
          </td>
          <td><?php echo $row["title"]; ?></td>
          <td><?php echo $row["description"]; ?></td>
          <td><?php echo $row["keywords"]; ?></td>
          <td>
            <form class="" method="post">
              <div class="btn-group">
                <a href="updateVideo.php?edit=<?php echo $row["id"]; ?>" class="w-50 btn btn-primary ">Update</a>
                <button type="button" onclick="confirmDelete(<?php echo $row["id"]; ?>,2);" class="w-50 btn btn-danger text-center">Delete</button>

                <!-- <a href="process.php?deleteVideo=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this?');" class="w-50 btn btn-danger">Delete</a> -->
              </div>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


  <div class="videos-gallery" id="videosGallery" hidden>

    <?php

    while ($row = mysqli_fetch_array($query_run_s)) {
        if ($row["is_private"] || !$row["validated"]) {
          if($row["id_supplier"]!=$_SESSION["user_id"]){
            continue;
          }
          }


     ?>
    <h3 class="heading">Video gallery</h3>
    <div class="container">
      <div class="main-video">
        <div class="video">
          <video height="400" width="800" src="<?php echo $row['video']; ?>" controls muted autoplay>
          </video>
          <h3 class="title"><?php echo $row["title"]; ?></h3>
        </div>
      </div>
      <?php

          break;
            }

          ?>
      <div class="video-list">
        <div class="vid active">
          <video src="<?php echo $row['video']; ?>">
          </video>
          <h3 class="title"><?php echo $row["title"]; ?></h3>
        </div>
        <?php
        while ($row = mysqli_fetch_array($query_run_s)) {
          if ($row["is_private"] || !$row["validated"]) {
            if($row["id_supplier"]!=$_SESSION["user_id"]){
              continue;
            }
            }

         ?>
        <div class="vid">
          <video src="<?php echo $row['video']; ?>">
          </video>
          <h3 class="title"><?php echo $row["title"]; ?></h3>
        </div>
        <?php
            }
         ?>
      </div>
    </div>

  </div>

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
          href="https://github.com/MrBrown23/RoadsCCTVPlus"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fa-brands fa-github"></i>
        </a>
    <p>Copyright &copy; 2022 <a href="index.php" class="text-black">RoadesCCTVPlus</a>.</p>
  </footer>
  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/mainpage.js"></script>
  <script src="js/uploadvis.js"></script>
  <script src="js/videos.js" type="text/javascript"></script>
  <script src="js/alerts.js" type="text/javascript "></script>

  <script type="text/javascript">
  if (window.location.href.indexOf("search") > -1){
    goToWatch();
  }
    function goToInsert() {
      document.getElementById("insertPage").classList.add("active");
      document.getElementById("dragAndDrop").hidden = false;
      document.getElementById("editTable").hidden = true;
      document.getElementById("videosGallery").hidden = true;
      document.getElementById("watchPage").classList.remove("active");
      document.getElementById("editPage").classList.remove("active");

    }

    function goToWatch() {
      document.getElementById("dragAndDrop").hidden = true;
      document.getElementById("editTable").hidden = true;
      document.getElementById("videosGallery").hidden = false;
      document.getElementById("watchPage").classList.add("active");
      document.getElementById("insertPage").classList.remove("active");
      document.getElementById("editPage").classList.remove("active");
    }

    function goToEdit() {
      document.getElementById("dragAndDrop").hidden = true;
      document.getElementById("videosGallery").hidden = true;
      document.getElementById("editTable").hidden = false;
      document.getElementById("editPage").classList.add("active");
      document.getElementById("watchPage").classList.remove("active");
      document.getElementById("insertPage").classList.remove("active");
    }

    function submitForm() {
      document.forms["signupForm"].submit();
    }
  </script>
</body>

</html>
