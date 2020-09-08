<?php
  require('loginheader.php');
?>

<body class="bg-gradient-primary">

  <div class="container">
  <?php
    if (isset($_SESSION['id'])) {
      header('Location: index.php');
    }
  ?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    <?php
                      if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                          echo '<p class="signuperror">Fill in all fields!</p>';
                        }
                        else if ($_GET["error"] == "sqlerror") {
                          echo '<p class="signuperror">SQL error!</p>';
                        }
                        else if ($_GET["error"] == "wrongpwd") {
                          echo '<p class="signuperror">Wrong password!</p>';
                        }
                      }
                      else if (isset($_GET["login"])) {
                        if ($_GET["login"] == "success") {
                          echo '<p class="signupsuccess">Login successful!</p>';
                        }
                        else if ($_GET["login"] == "wronguidpwd") {
                          echo '<p class="signupsuccess">User not found.</p>';
                        }
                      }
                    ?>
                  </div>
                  <form class="user" action="includes/login.inc.php" method="post">
                    <div class="form-group">
                      <input type="text" name="mailuid" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Email Address or Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <?php
                    if (isset($_GET["newpwd"])) {
                      if ($_GET["newpwd"] == "passwordupdated") {
                        echo '<p>Password Reset Complete.</p>';
                      }
                      else if ($_GET["newpwd"] == "empty") {
                        echo '<p>Empty fields.</p>';
                      }
                      else if ($_GET["newpwd"] == "pwdnotsame") {
                        echo '<p>Passwords don\'t match.</p>';
                      }
                    }
                  ?>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
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