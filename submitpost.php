<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Post Announcement</h1>
          <h1>Submit Post</h1>
          
          <form class="form-group" action="includes/post.inc.php" method="post">
            <div class="form-group">
              <textarea type="text" name="title" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="Title"></textarea>
            </div>
            <div class="form-group">
              <textarea type="text" name="description" class="form-control form-control-user" namearia-describedby="idToSearch" placeholder="Content"></textarea>
            </div>
            <button class="btn btn-primary submitbutton" type="submit" name="post-submit">Post</button>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
  require('footer.php');
?>