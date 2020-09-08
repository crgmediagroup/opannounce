<?php
  require('includes/modules.php');
  $newestPost = getNewestPost();
?>

<?=$newestPost['authorname']?>