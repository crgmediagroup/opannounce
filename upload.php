<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Uploads</h1>
          <?php
            if (isset($_SESSION['message']) && $_SESSION['message'])
            {
              printf('<b>%s</b>', $_SESSION['message']);
              unset($_SESSION['message']);
            }
          ?>
          <form method="POST" class="form-group" action="includes/upload.inc.php" enctype="multipart/form-data">
            <div>
              <span style="margin-right:4px;">Upload a File: </span>
              <input type="file" name="uploadedFile"/>
            </div><br>
            <div class="form-group">
              <input type="text" name="name" class="form-control form-control-user" namearia-describedby="nameofimage" placeholder="Name of image">
            </div>
            <div class="form-group">
              <input type="text" name="alt" class="form-control form-control-user" namearia-describedby="alttextofimage" placeholder="Alt text">
            </div>
            <input class="btn btn-primary" type="submit" name="uploadBtn" value="Upload"/>
          </form><br>

          <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Change Path
          </button><br><br>

          <?php
            if (isset($_GET["toolcompletion"])) {
              if ($_GET["toolcompletion"] == "done") {
                echo '<p class="mb-4">Done! Now change the values in your config file to match the ones you just applied!</p>';
              }
            }
          ?>

          <!-- Table -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uploads</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Internal ID</th>
                      <th>Name of Image</th>
                      <th>Alt text</th>
                      <th>Path</th>
                      <th>Markdown</th>
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
                    $sql = "SELECT pathUploads, nameUploads, altUploads, idUploads FROM uploads";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr>
                          <td>".$row["idUploads"]."</td>
                          <td>".$row["nameUploads"]."</td>
                          <td>".$row["altUploads"]."</td>
                          <td>".$row["pathUploads"]."</td>
                          <td>![".$row["altUploads"]."](".$row["pathUploads"].")</td>
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

      <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Path Change Tool</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>By proceeding, your image paths will be changed to fit the install path in the config. Only run this tool if you have changed the path, as it could take a while if you have a lot of uploads/posts.</p>
              <form action="includes/changepath.inc.php" method="post">
                <div class="form-group">
                  <input type="text" value="<?=$configs['installdirectory']?>" name="oldpath" class="form-control form-control-user" namearia-describedby="pathToTransformFrom" placeholder="New path - must end in /">
                </div>
                <div class="form-group">
                  <input type="text" value="<?=$configs['protocol']?>" name="oldprotocol" class="form-control form-control-user" namearia-describedby="pathToTransformFrom" placeholder="Old protocol - like 'https://'">
                </div>
                <div class="form-group">
                  <input type="text" name="newpath" class="form-control form-control-user" namearia-describedby="pathToUse" placeholder="New path - must end in /">
                </div>
                <div class="form-group">
                  <input type="text" name="newprotocol" class="form-control form-control-user" namearia-describedby="pathToUse" placeholder="New protocol - like 'https://'">
                </div>
                <button type="submit" name="proceedbutton" class="btn btn-primary">Proceed</button>
              </form>
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<?php
  require('footer.php');
?>