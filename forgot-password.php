<?php
  require('loginheader.php');
?>

<body class="bg-gradient-primary">

  <div class="container">

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