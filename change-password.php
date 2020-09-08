<?php
  require('loginheader.php');
?>

<body class="bg-gradient-primary">

  <div class="container">

  <?php
    if (!isset($_GET["selector"])) {
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
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">An e-mail will be send to you with instructions on how to reset your password.</p>
                  </div>
                  <?php
                    $selector  = $_GET["selector"];
                    $validator = $_GET["validator"];

                    if (empty($selector) || empty($validator)) {
                      echo "Could not validate your request.";
                    } else {
                      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        ?>

                        <form class="form-resetpwd" action="includes/reset-password.inc.php" method="post">
                          <input class="form-control forminput" type="hidden" name="selector" value="<?php echo $selector ?>">
                          <input class="form-control forminput" type="hidden" name="validator" value="<?php echo $validator ?>">

                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" name="pwd" id="exampleInputPassword" placeholder="Password">
                          </div>
                          <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" name="pwd-repeat" id="exampleRepeatPassword" placeholder="Repeat Password">
                          </div>
                          <button class="btn btn-primary submitbutton" type="submit" name="reset-password-submit">Reset password</button>
                        </form>

                        <?php
                      }
                    }
                  ?>
                  <?php
                    if (isset($_GET["newpwd"])) {
                      if ($_GET["newpwd"] == "empty") {
                        echo '<p>Empty fields.</p>';
                      }
                      else if ($_GET["newpwd"] == "pwdnotsame") {
                        echo '<p>Passwords don\'t match.</p>';
                      }
                    }
                  ?>
                  <form class="user" action="includes/reset-request.inc.php" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <button href="login.php" type="submit" name="reset-request-submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <?php
                    if (isset($_GET["reset"])) {
                      if ($_GET["reset"] == "success") {
                        echo '<p class="signupsuccess">Check your e-mail!</p><hr>';
                      }
                    }
                  ?>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
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

    </div>

  </div>

<?php
  require('loginfooter.php');
?>