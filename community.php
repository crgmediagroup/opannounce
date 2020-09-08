<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Announcement Archive</h1>
          <table id="tablePreview" class="table" style="width: 100%;">
          <!--Table body-->
          <tbody>
            <tr>
              <td>
                <?php
                if (!isset($_SESSION['id'])) {
                  header('Location: index.php');
                  exit();
                }
                require 'includes/authprof.inc.php';
              
                $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts FROM posts ORDER BY idPosts DESC LIMIT 1');
              
                $stmt->execute();
                $stmt->bind_result($author, $authorname, $date, $title, $id);
                $stmt->fetch();
                $stmt->close();
                ?>
                <a href="post.php?urlPostID=<?=$id?>"><p><b><?=$title?></b></p></a>
                <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>. Internal ID <?=$id?>.</p><br>
              </td>
              <td>
              <h6>Look up post by Internal ID</h6>
                <form class="form-group" action="includes/postsearch.inc.php" method="post">
                  <div class="form-group">
                    <input type="text" name="idSearch" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="ID">
                  </div>
                  <button class="btn btn-primary" name="post-search-submit">Search</button>
                </form>
              </td>
            </tr>
            <tr>
              <td>
                <?php
                if (!isset($_SESSION['id'])) {
                  header('Location: index.php');
                  exit();
                }
                require 'includes/authprof.inc.php';
              
                $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts FROM posts ORDER BY idPosts DESC LIMIT 1, 1');
              
                $stmt->execute();
                $stmt->bind_result($author, $authorname, $date, $title, $id);
                $stmt->fetch();
                $stmt->close();00
                ?>
                <a href="post.php?urlPostID=<?=$id?>"><p><b><?=$title?></b></p></a>
                <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>. Internal ID <?=$id?>.</p><br>
              </td>
              <td>
                <a href="submitpost.php" class="btn btn-primary">Submit Post</a>
              </td>
            </tr>
            <tr>
              <td>
                <?php
                if (!isset($_SESSION['id'])) {
                  header('Location: index.php');
                  exit();
                }
                require 'includes/authprof.inc.php';
              
                $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts FROM posts ORDER BY idPosts DESC LIMIT 2, 1');
              
                $stmt->execute();
                $stmt->bind_result($author, $authorname, $date, $title, $id);
                $stmt->fetch();
                $stmt->close();00
                ?>
                <a href="post.php?urlPostID=<?=$id?>"><p><b><?=$title?></b></p></a>
                <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>. Internal ID <?=$id?>.</p><br>
              </td>
            </tr>
            <tr>
              <td>
                <?php
                if (!isset($_SESSION['id'])) {
                  header('Location: index.php');
                  exit();
                }
                require 'includes/authprof.inc.php';
              
                $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts FROM posts ORDER BY idPosts DESC LIMIT 3, 1');
              
                $stmt->execute();
                $stmt->bind_result($author, $authorname, $date, $title, $id);
                $stmt->fetch();
                $stmt->close();00
                ?>
                <a href="post.php?urlPostID=<?=$id?>"><p><b><?=$title?></b></p></a>
                <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>. Internal ID <?=$id?>.</p><br>
              </td>
            </tr>
            <tr>
              <td>
              <?php
                if (!isset($_SESSION['id'])) {
                  header('Location: index.php');
                  exit();
                }
                require 'includes/authprof.inc.php';
              
                $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts FROM posts ORDER BY idPosts DESC LIMIT 4, 1');
              
                $stmt->execute();
                $stmt->bind_result($author, $authorname, $date, $title, $id);
                $stmt->fetch();
                $stmt->close();00
                ?>
                <a href="post.php?urlPostID=<?=$id?>"><p><b><?=$title?></b></p></a>
                <p style="font-size:16px">Written by <a href="profile2.php?urlID=<?=$author?>"><?=$authorname?></a> at <?=$date?>. Internal ID <?=$id?>.</p><br>     
              </td>
            </tr>
          </tbody>
          <!--Table body-->
        </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>