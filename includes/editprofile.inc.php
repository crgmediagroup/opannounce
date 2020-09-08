<?php
$configs = include('config.php');
if (isset($_POST['edit-submit'])) {

  session_start();

  require('dbh.inc.php');

  $email1 = $_POST['editemail'];
  $email = str_replace("'", "", $email1);
  
  $sql = "UPDATE users SET emailUsers='$email' WHERE idUsers= ".$_SESSION['id'];

  if ($conn->query($sql) === TRUE) {
    header("Location: ../profile.php");
  } else {
    echo "Error updating table users: " . $conn->error;
  }

  $conn->close();
}
else {
  header("Location: ../editprofile.php");
  exit();
}
