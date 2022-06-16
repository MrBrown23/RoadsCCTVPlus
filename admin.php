<?php
  include("connection.php");
  include("functions.php");
  session_start();
  if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
}
else {
  if (!$_SESSION["is_admin"]) {
    header("Location: mainpage.php");
  }
$query = "select * from users;";
$query_run = mysqli_query($connection, $query);
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
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/offcanvas-navbar/">
  <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

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
  <link rel="stylesheet" href="/css/themes.css">
  <link href="css/videos.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="/css/alerts.css"> -->
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-teal-800" aria-label="Main navigation">
    <div class="container-fluid">
      <h3 class="float-md-start mb-0"><a href="mainpage.php" class="navbar-brand">RoadsCCTVPlus</a></h3>
      <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" id="usersPage" onclick="goTo('usersTable','usersPage');" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="suppliersPage" onclick="goTo('suppliersTable','suppliersPage');" href="#">Suppliers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="videosEditPage" onclick="goTo('videosTable','videosEditPage');" href="#">Videos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="videosPage" onclick="goTo('videosGallery','videosPage');" href="#">Watch</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="process.php?logout=<?php $_SESSION["user_id"]; ?>">Logout</a></li>
            </ul>
          </li>
          <!-- ALTER TABLE video
ADD FOREIGN KEY (id_supplier) REFERENCES supplier(id); -->
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" onclick="goTo();" type="submit">Search</button>
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



  <div class="board" id="usersTable">
    <table width="100%">
      <thead class="text-secondary">
        <tr>
          <td>First name</td>
          <td>Last name</td>
          <td>username</td>
          <td>Email</td>
          <td>Message</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($query_run)) {

         ?>
        <tr>
          <td><?php echo $row["f_name"]; ?></td>
          <td><?php echo $row["l_name"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["message"]; ?></td>
          <td>
            <form class="" method="post">
              <div class="btn-group">
                <a href="process.php?accept=<?php echo $row["id"]; ?>" class="w-50 btn btn-success text-center">Accept</a>
                <button type="button" onclick="confirmDelete(<?php echo $row["id"]; ?>,0);" class="w-50 btn btn-danger text-center">Delete</button>
              </div>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="board" id="suppliersTable" hidden>
    <table width="100%">
      <thead class="text-secondary">
        <tr>
          <td>First name</td>
          <td>Last name</td>
          <td>username</td>
          <td>Email</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "select * from suppliers where is_admin = 0;";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($query_run)) {

         ?>
        <tr>
          <td><?php echo $row["f_name"]; ?></td>
          <td><?php echo $row["l_name"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td>
            <form class="" method="post">
              <div class="btn-group">
                <a href="update.php?edit=<?php echo $row["id"]; ?>" class="w-50 btn btn-primary text-center">Update</a>
                <button type="button" onclick="confirmDelete(<?php echo $row["id"]; ?>,1);" class="w-50 btn btn-danger text-center">Delete</button>
              </div>
            </form>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>


  <div class="board" id="videosTable" hidden>
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

        $query = "select * from videos ;";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($query_run)) {

         ?>
        <tr>
          <td>
            <video src="videos/<?php echo $row["video"]; ?>" height="100" width="200" poster="posterimage.jpg" muted controls>
            </video>
          </td>
          <td><?php echo $row["title"]; ?></td>
          <td><?php echo $row["description"]; ?></td>
          <td><?php echo $row["keywords"]; ?></td>
          <td>
            <form class="" method="post">
              <div class="btn-group">
                <a href="process.php?acceptVideo=<?php echo $row["id"]; ?>" class="w-50 btn btn-success ">Accept</a>
                <a href="process.php?deleteVideo=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this?');" class="w-50 btn btn-danger">Delete</a>
              </div>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
    </div>


  <div class="bg-light videos-gallery" id="videosGallery" hidden>

    <?php

    $query = "select * from videos order by `videos`.`adding_date` desc;";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($query_run)) {

     ?>
    <h3 class="heading">Video gallery</h3>
    <div class="container">
      <div class="main-video">
        <div class="video">
          <video height="360" width="640" src="videos/<?php echo $row['video']; ?>" controls muted autoplay>
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
          <video src="videos/<?php echo $row['video']; ?>">
          </video>
          <h3 class="title"><?php echo $row["title"]; ?></h3>
        </div>
        <?php
        while ($row = mysqli_fetch_array($query_run)) {

         ?>
        <div class="vid">
          <video src="videos/<?php echo $row['video']; ?>">
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
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fa-brands fa-github"></i>
        </a>
    <p>Copyright &copy; 2022  <a href="index.php" class="text-black">RoadesCCTVPlus</a>.</p>
  </footer>
  <!-- <script type="text/javascript" src="alerts.js"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/mainpage.js"></script>
  <script src="js/videos.js" type="text/javascript"></script>

  <script src="js/alerts.js" type="text/javascript ">
  </script>
  <script type="text/javascript">
  var pages = ["usersTable","suppliersTable","videosGallery","videosTable"];
  var navLinks = ["usersPage","suppliersPage","videosPage","videosEditPage"];
  function goTo(page,navLink){
    for (nl in navLinks) {
      if (navLinks[nl] === navLink) {
        document.getElementById(navLinks[nl]).classList.add("active");
      }
      else {
        document.getElementById(navLinks[nl]).classList.remove("active");
      }
    }
    for (pg in pages) {
      if (pages[pg] === page) {
        document.getElementById(pages[pg]).hidden = false;
      }
      else {
        document.getElementById(pages[pg]).hidden = true;
      }
    }
  }


    function submitForm() {
      document.forms["signupForm"].submit();
    }

  </script>
</body>
</html>
