<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
          <?php
            require "includes/authprof.inc.php";

            $stmt = $con->prepare('SELECT emailUsers FROM users WHERE idUsers = ?');
                      
            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->fetch();
            $stmt->close();00
          ?>
          <?php
            if (!isset($_SESSION['id'])) {
              header('Location: index.php');
              exit();
            }
          ?>
            <?php
              if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidmail") {
                  echo '<p class="signuperror">Invalid email!</p>';
                }
              }
            ?>
            <form class="form-group" action="includes/editprofile.inc.php" method="post">
              <div class="form-group">
                <input type="text" name="editemail" value="<?=$email?>" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="New Email">
              </div>
              <button class="btn btn-primary submitbutton" type="submit" name="edit-submit">Submit</button>
            </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>