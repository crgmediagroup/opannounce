<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
            if (!isset($_SESSION['id'])) {
              header('Location: index.php');
              exit();
            }
            else if (!isset($_GET["urlPostID"]) || $_GET["urlPostID"] == "") {
              header('Location: community.php');
              exit();
            }
            require 'includes/authprof.inc.php';

            $stmt = $con->prepare('SELECT authorPosts, datePosts, titlePosts, descriptionPosts FROM posts WHERE idPosts = '.$_GET["urlPostID"]);
            
            $stmt->execute();
            $stmt->bind_result($author, $date, $title, $description);
            $stmt->fetch();
            $stmt->close();
          ?>
          <?php
            require 'includes/authprof.inc.php';

            $stmt = $con->prepare('SELECT uidUsers FROM users WHERE idUsers = '.$author);
            
            $stmt->execute();
            $stmt->bind_result($authorname);
            $stmt->fetch();
            $stmt->close();00
          ?>
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
          <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>.</p>

          <?=$description?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>