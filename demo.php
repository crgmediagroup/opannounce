<?php
  require('includes/modules.php');
  $post = getPostWithId($_GET["id"]);
?>
<?=$post['title']?>