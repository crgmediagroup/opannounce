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
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1>Welcome to OpAnnounce</h1>
                    <?php
                      if (!isset($_SESSION['id'])) {
                        echo '<p class="mb-4">This is a private computing system. Admins can log in <a href="login.php">here.</p></p>';
                      }
                      else if (isset($_SESSION['id'])) {
                        echo '<p class="mb-4">Head to the <a href="dashboard.php">dashboard</a> for a complete overview.</p>';
                      }
                    ?>
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