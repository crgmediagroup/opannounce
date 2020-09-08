<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Announcements</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        require('includes/authprof.inc.php');

                        $sql = "SELECT idPosts FROM posts";
   
                        if ($result = mysqli_query($con,$sql)){
                           $rowcount = mysqli_num_rows($result);
                           
                           printf($rowcount);
                           mysqli_free_result($result);
                        }
                        mysqli_close($con);
                      ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User Accounts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        require('includes/authprof.inc.php');

                        $sql = "SELECT idUsers FROM users";
   
                        if ($result = mysqli_query($con,$sql)){
                           $rowcount = mysqli_num_rows($result);
                           
                           printf($rowcount);
                           mysqli_free_result($result);
                        }
                        mysqli_close($con);
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Domain</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?=$configs['protocol']?><?=$configs['site']?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Site Name</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$configs['sitename']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- About -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">About</h6>
                </div>
                <div class="card-body">
                  <p>Opannounce is a lightweight, open source content management system. It is built for simplicity, and the ability to embed posts or announcements in HTML instead of dealing with seperate sections of your site and complex themes.</p>
                </div>
              </div>

              <!-- How it Works -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">How it Works</h6>
                </div>
                <div class="card-body">
                  <p>Posts and other information that the user can see are split into modules. You use a module by calling specific function. There is more information on the GitHub docs. Example below:</p>
                  <code>getNewestPost();</code><br>
                  <code>getSecondPost();</code><br>
                  <code>getThirdOrOlderPost(ordinal);</code>
                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- UX -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">User Experience</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_Posts_re_ormv.svg" alt="">
                  </div>
                  <p>Users can view your announcements however you please. You can even embed posts into the top section of your site, so users see the newest announcement when they load the site.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>