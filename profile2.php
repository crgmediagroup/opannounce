<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Other User's Profile</h1>
          <?php
            if (!isset($_SESSION['id'])) {
              header('Location: index.php');
              exit();
            }
            else if (!isset($_GET["urlID"]) || $_GET["urlID"] == "") {
              header('Location: profile.php');
              exit();
            }
          ?>
          <?php
            require 'includes/authprof.inc.php';

            $stmt = $con->prepare('SELECT uidUsers FROM users WHERE idUsers = '.$_GET["urlID"]);
            
            $stmt->execute();
            $stmt->bind_result($username);
            $stmt->fetch();
            $stmt->close();

            if ($username == "") {
              echo "<script type='text/javascript'>alert('User does not exist.');</script>";
            }
          ?>
          Username:
          <?=$username?><br>
          User ID:
          <?=$_GET["urlID"]?><br><br><hr>
          <br>
          <form class="form-group" action="includes/search.inc.php" method="post">
            <div class="form-group">
              <input type="text" name="idSearch" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="ID">
            </div>
            <button class="btn btn-primary submitbutton" class="submit" name="search-submit">Search</button>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>