<?php
  include("connection.php");
  include("functions.php");
  require "header.php";
  if(isset($_SESSION)){
    session_start();
  $query = "select * from videos order by `videos`.`adding_date` desc;";
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
  <link href="css/videos.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-success" aria-label="Main navigation">
    <div class="container-fluid">
      <h3 class="float-md-start mb-0"><a href="index.php" class="navbar-brand">RoadsCCTVPlus</a></h3>
      <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="login.php">Login</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" action="search.php" role="search" method="post">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="videos-gallery">
    <?php
    while ($row = mysqli_fetch_array($query_run)) {
      if ($row["is_private"]) {
          continue;
        }

     ?>
    <h3 class="heading">Video gallery</h3>
    <div class="container">
      <div class="main-video">
        <div class="video">
          <video height="400" width="800" src="videos/<?php echo $row['video']; ?>" controls muted autoplay>
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
          if ($row["is_private"]) {
              continue;
            }


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
    <p>Copyright &copy; 2022 <a href="index.php" class="text-black">RoadesCCTVPlus</a>.</p>
  </footer>
  <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="js/mainpage.js"></script>
  <script src="js/videos.js" type="text/javascript"></script>
</body>

</html>
