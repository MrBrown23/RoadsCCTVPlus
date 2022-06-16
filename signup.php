<?php
  include("connection.php");
  include("functions.php");
    require "header.php";
  if(isset($_SESSION)){
    if (isset($_POST["submit"])) {

      $name = mysqli_real_escape_string($connection,$_POST["name"]);
      $f_name = mysqli_real_escape_string($connection,$_POST["f_name"]);
      $username = mysqli_real_escape_string($connection,$_POST["username"]);
      $email= mysqli_real_escape_string($connection,$_POST["email"]);
      $password = mysqli_real_escape_string($connection,$_POST["password"]);
      $user_message = mysqli_real_escape_string($connection,$_POST["user_message"]);


      if(!empty($name) && !empty($f_name) && !empty($username) && !empty($email) && !empty($password) && !empty($user_message) &&
      !is_numeric($name) && !is_numeric($f_name) && !is_numeric($username) && !is_numeric($email)){

        add_new_user($connection,$email,$password,$username,$name,$f_name, $user_message);
        header("Location: login.php");
        die();

      }

  }
}

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
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


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <!-- <img class="d-block mx-auto mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <h3 class="h3 mb-3 mb-0"><a href="index.php" class="navbar-brand">RoadsCCTVPlus</a></h3><br>
      <h2>Registration</h2>
      <p class="lead">Enter your credentials to create a supplier account, and wait for us to accept your request.<br>  This process may take a few hours.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Fill the form</h4>
        <form class="needs-validation" name="signupForm"  method="post" novalidate >
          <div class="row g-3">

            <!-- ==============================================================================First name===================================================================================== -->
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <!-- ==============================================================================First Name===================================================================================== -->

            <!-- ==============================================================================Last Name===================================================================================== -->

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="f_name" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <!-- ==============================================================================Last Name===================================================================================== -->

<!-- ==============================================================================Username===================================================================================== -->

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>


            <!-- ==============================================================================Username===================================================================================== -->


            <!-- ==============================================================================Email===================================================================================== -->

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

<!-- ==============================================================================Password===================================================================================== -->


            <div class="col-12">
              <label for="email" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Kr45%d#8" required>
              <div class="invalid-feedback">
                Please enter a valid password.
              </div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Renter password</label>
              <input type="password" class="form-control" id="inputEmail" formControlName="email" id="passwordV" name="passwordV" placeholder="Kr45%d#8" required>
              <div class="invalid-feedback" id="checkPassword">
                Please enter a valid password.
              </div>
            </div>

            <!-- ==============================================================================Password===================================================================================== -->



            <!-- ==============================================================================TEXT===================================================================================== -->
            <div class="mb-3">
              <label for="validationTextarea" class="form-label">Your message</label>
              <textarea type="text" class="form-control" id="validationTextarea" placeholder="Why you want to signup in our website?" name="user_message"required></textarea>
              <div class="invalid-feedback">
                Please enter a message in the textarea.
              </div>
            </div>
            <!-- ==============================================================================TEXT===================================================================================== -->


          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info" required>
            <label class="form-check-label" for="save-info">I agree all statements in <a href="#!">Terms of service</a></label>
          </div>
          <button class="w-100 btn btn-primary btn-lg" onclick="submitForm();" name="submit" type="submit">Continue to checkout</button>
        </form>
        <label class="form-check-label" for="save-info"><p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                       class=""><u>Login here</u></a></p></label>
      </div>
    </div>

  </main>

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
</div>


    <!-- ==================================================================================Javascript =============================================================================-->

    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      function submitForm(){
        var getPass1 = document.getElementById("password");
        var getPass2 = document.getElementById("passwordV");
        if(getPass1.value == getPass2.value && getPass1.value != ""){
          document.getElementById("passwordV").classList.remove("is-invalid");
          document.getElementById("passwordV").classList.remove("border-danger");
          window.alert("Truuuuuuuuuuuuuuuuuuuuuuuue!");
          document.forms["signupForm"].submit();
        }
        else {
          window.alert("Please enter the same password");
          document.getElementById("passwordV").classList.add("is-invalid");
          document.getElementById("passwordV").classList.add("border-danger");
          if(getPass2.value != "")
          document.getElementById("checkPassword").innerHTML = "Password not matching.";
        }
      }
    </script>
      <script src="js/form-validation.js"></script>
      <!-- ==================================================================================Javascript =============================================================================-->

  </body>
</html>
