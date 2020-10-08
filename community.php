<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Post Archive</h1>

          <h6>Look up post by Internal ID</h6>
          <form class="form-group" action="includes/postsearch.inc.php" method="post">
            <div class="form-group">
              <input type="text" name="idSearch" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="ID">
            </div>
            <button class="btn btn-primary" name="post-search-submit">Search</button>
          </form>

          <a href="submitpost.php" class="btn btn-primary">Make a Post</a><br><br>

          <!-- Table -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Timestamp</th>
                      <th>ID</th>
                    </tr>
                  </thead>
                  <!--<tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                    </tr>
                  </tfoot>-->
                  <tbody>
                  <?php
                    require('includes/dbh.inc.php');
                    $sql = "SELECT idPosts, authorPosts, authorNamePosts, datePosts, titlePosts FROM posts";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>
                          <td><a href=\"post.php?urlPostID=".$row['idPosts']."\">".$row['titlePosts']."</a></td>
                          <td><a href=\"profile2.php?urlID=".$row['authorPosts']."\">".$row['authorNamePosts']."</a></td>
                          <td>".$row["datePosts"]."</td>
                          <td>".$row["idPosts"]."</td>
                        </tr>";
                      }
                    } else {
                      echo "0 results";
                    }

                    $conn->close();
                  ?>
                  </tbody>
                </table>
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