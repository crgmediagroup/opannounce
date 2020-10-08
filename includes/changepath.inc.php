<?php
$configs = include('config.php');

if (isset($_POST['proceedbutton'])) {
  $newpath = $_POST['newpath'];
  $oldpath = $_POST['oldpath'];
  $newprotocol = $_POST['newprotocol'];
  $oldprotocol = $_POST['oldprotocol'];
  require 'dbh.inc.php';

  $sql = "UPDATE uploads SET pathUploads = replace(pathUploads, '".$oldprotocol.$oldpath."', '".$newprotocol.$newpath."')";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo $conn->error;
    exit();
  }

  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  $sql = "UPDATE posts SET descriptionPosts = replace(descriptionPosts, '".$oldprotocol.$oldpath."', '".$newprotocol.$newpath."')";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo $conn->error;
    exit();
  }

  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  header("Location: ../upload.php?toolcompletion=done");
}
else {
  header("Location: ../upload.php");
}
