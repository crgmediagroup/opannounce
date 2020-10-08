<?php
  require('header.php');
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Post Announcement</h1>

          <form class="form-group" action="includes/post.inc.php" method="post">
            <div class="form-group">
              <textarea type="text" id="titleofpost" name="title" class="form-control form-control-user" placeholder="Title"></textarea>
            </div>
            <div class="form-group">
              <textarea type="text" id="contentofpost" name="description" class="form-control form-control-user" placeholder="Content (use markdown)"></textarea>
            </div>
            <div class="form-group">
              <textarea type="text" id="thumbofpost" name="thumbnail" class="form-control form-control-user" placeholder="Thumbnail (URL)"></textarea>
            </div>
            <button class="btn btn-primary submitbutton" type="submit" name="post-submit">Post</button><br>
          </form>
          <button class="btn btn-primary submitbutton" onclick="save();">Save</button> <button class="btn btn-primary submitbutton" onclick="load();">Load</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Upload
          </button><br><br>
          <script>
            function load() {
              document.getElementById('titleofpost').value = localStorage.getItem('title');
              document.getElementById('contentofpost').value = localStorage.getItem('content');
              document.getElementById('thumbofpost').value = localStorage.getItem('image');
            }
            function save() {
              localStorage.setItem('title', document.getElementById('titleofpost').value);
              localStorage.setItem('content', document.getElementById('contentofpost').value);
              localStorage.setItem('image', document.getElementById('thumbofpost').value);
            }
          </script>
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>Element</th>
                <th>Markdown Syntax</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Heading</td>
                <td><code># H1<br />
                    ## H2<br />
                    ### H3</code></td>
              </tr>
              <tr>
                <td>Bold</td>
                <td><code>**bold text**</code></td>
              </tr>
              <tr>
                <td>Italic</td>
                <td><code>*italicized text*</code></td>
              </tr>
              <tr>
                <td>Blockquote</td>
                <td><code>&gt; blockquote</code></td>
              </tr>
              <tr>
                <td>Ordered List</td>
                <td><code>
                  1. First item<br />
                  2. Second item<br />
                  3. Third item<br />
                </code></td>
              </tr>
              <tr>
                <td>Unordered List</td>
                <td>
                  <code>
                    - First item<br />
                    - Second item<br />
                    - Third item<br />
                  </code>
                </td>
              </tr>
              <tr>
                <td>Code</td>
                <td><code>`code`</code></td>
              </tr>
              <tr>
                <td>Horizontal Rule</td>
                <td><code>---</code></td>
              </tr>
              <tr>
                <td>Link</td>
                <td><code>[title](https://www.example.com)</code></td>
              </tr>
              <tr>
                <td>Image</td>
                <td><code>![alt text](image.jpg)</code></td>
              </tr>
            </tbody>
          </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload file</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to leave this page to upload a file? Make sure to save your changes.</p>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="save();window.location.href='upload.php'"class="btn btn-primary">Save changes and proceed</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<?php
  require('footer.php');
?>