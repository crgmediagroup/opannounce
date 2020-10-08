<?php
  require('loginheader.php');
?>

<body class="bg-gradient-primary">

  <div class="container">
  <?php
    if (!isset($_SESSION['id'])) {
      header('Location: index.php');
    }
  ?>

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                <?php
                  if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                      echo '<p class="mb-4">Fill in all fields!</p>';
                    }
                    else if ($_GET["error"] == "sqlerror") {
                      echo '<p class="mb-4">SQL error!</p>';
                    }
                    else if ($_GET["error"] == "invaliduid") {
                      echo '<p class="mb-4">Invalid Username!</p>';
                    }
                    else if ($_GET["error"] == "invaliduidmail") {
                      echo '<p class="mb-4">Invalid Username & Email!</p>';
                    }
                    else if ($_GET["error"] == "invalidmail") {
                      echo '<p class="mb-4">Invalid Email!</p>';
                    }
                    else if ($_GET["error"] == "passwordcheck") {
                      echo '<p class="mb-4">Passwords don\'t match!</p>';
                    }
                    else if ($_GET["error"] == "usertaken") {
                      echo '<p class="mb-4">Username already taken!</p>';
                    }
                  }
                  else if (isset($_GET["signup"])) {
                    if ($_GET["signup"] == "success") {
                      echo '<p class="mb-4">Login successful!</p>';
                    }
                    else if ($_GET["signup"] == "wronguidpwd") {
                      echo '<p class="mb-4">User not found.</p>';
                    }
                  }
                ?>
              </div>
              <form class="user" action="includes/signup.inc.php" method="post">
              <?php
                if (!empty($_GET["uid"])) {
                  echo '<div class="form-group">
                  <input class="form-control form-control-user" name="uid" placeholder="Username" value="'.$_GET["uid"].'">
                </div>';
                }
                else {
                  echo '<div class="form-group">
                  <input class="form-control form-control-user" name="uid" placeholder="Username">
                </div>';
                }

                if (!empty($_GET["mail"])) {
                  echo '<div class="form-group">
                  <input type="email" class="form-control form-control-user" name="mail" id="exampleInputEmail" placeholder="Email Address" value="'.$_GET["mail"].'">
                </div>';
                }
                else {
                  echo '<div class="form-group">
                  <input type="email" class="form-control form-control-user" name="mail" id="exampleInputEmail" placeholder="Email Address">
                </div>';
                }
              ?>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="pwd" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="pwd-repeat" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="signup-submit">
                  Register your Account
                </button>
                <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php
  require('loginfooter.php');
?>