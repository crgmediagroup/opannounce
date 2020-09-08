<?php
$configs = include('config.php');
session_start();
if (isset($_POST['search-submit'])) {
  
  $idToSearch1 = $_POST['idSearch'];

  $idToSearch = str_replace("'", "", $idToSearch1);

  header("Location: ../profile2.php?urlID=".$idToSearch);

}
?>