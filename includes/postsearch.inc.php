<?php
$configs = include('config.php');
session_start();
if (isset($_POST['post-search-submit'])) {
  
  $idToSearch = $_POST['idSearch'];
  header("Location: ../post.php?urlPostID=".$idToSearch);

}
?>