<?php
  require "header.php";
 ?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RoadsCCTVPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <link href="css/cover.css" rel="stylesheet">
    <link href="css/themes.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-teal-800">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">

    <div>
      <h3 class="float-md-start mb-0"><a href="index.php" class="navbar-brand">RoadsCCTVPlus</a></h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
        <a class="nav-link fw-bold py-1 px-0" href="videos.php">Watch</a>
        <a class="nav-link fw-bold py-1 px-0" href="contact.php">Contact</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
    <h1>Welcome to our website.</h1>
    <p class="lead">With our site, you can watch traffic videos, download them for use in your work or research,
       or you can help us expand our database by registering on our site and uploading your own videos.</p>
    <p class="lead">
      <a href="login.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Sign in</a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    <a
     class="btn btn-link btn-floating btn-lg text-white m-1"
     href="#!"
     role="button"
     data-mdb-ripple-color="dark"
     ><i class="fab fa-facebook-f"></i
   ></a>

   <!-- Twitter -->
   <a
     class="btn btn-link btn-floating btn-lg text-white m-1"
     href="#!"
     role="button"
     data-mdb-ripple-color="dark"
     ><i class="fab fa-twitter"></i
   ></a>
    <a
      class="btn btn-link btn-floating btn-lg text-white m-1"
      href="#!"
      role="button"
      data-mdb-ripple-color="dark"
      ><i class="fab fa-instagram"></i
    ></a>
    <a
        class="btn btn-link btn-floating btn-lg text-white m-1"
        href="https://github.com/"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fa-brands fa-github"></i>
      </a>
    <p>Copyright &copy; 2022 <a href="index.php" class="text-white">RoadesCCTVPlus</a>.</p>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
