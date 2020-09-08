<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Your Profile</h1>
          <?php
            if (!isset($_SESSION['id'])) {
              header('Location: index.php');
              exit();
            }
            require 'includes/authprof.inc.php';

            $stmt = $con->prepare('SELECT emailUsers, uidUsers FROM users WHERE idUsers = ?');
                    
            $stmt->bind_param('i', $_SESSION['id']);
            $stmt->execute();
            $stmt->bind_result($email, $username);
            $stmt->fetch();
            $stmt->close();00
          ?>
          Username:
          <?=$username?><br>
          Email:
          <?=$email?><br>
          User ID:
          <?=$_SESSION['id']?><br>
          <form class="form-group" action="includes/delete.inc.php" method="post">
            <button class="btn btn-primary submitbutton" name="delete-submit">Delete</button>
          </form><br>

          <hr><br>

          <h4>Change your email!</h4>
          <form class="form-group" action="editprofile.php">
            <button class="btn btn-primary submitbutton">Edit</button>
          </form><br>

          <hr><br>

          <h4>Look up another user!</h4>
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