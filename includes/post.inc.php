<?php
$configs = include('config.php');
session_start();
if (isset($_POST['post-submit'])) {

  require 'dbh.inc.php';

  $stmt = $conn->prepare('SELECT uidUsers, idUsers FROM users WHERE idUsers = ?');
            
  $stmt->bind_param('i', $_SESSION['id']);
  $stmt->execute();
  $stmt->bind_result($authorog1, $authorid1);
  $stmt->fetch();
  $stmt->close();

  $titleog1 = $_POST['title'];
  $descriptionog1 = $_POST['description'];

  $titleog = str_replace("'", "", $titleog1);
  $descriptionog = str_replace("'", "", $descriptionog1);
  $authorog = str_replace("'", "", $authorog1);
  $authorid = str_replace("'", "", $authorid1);
  
  $author = $authorid; 
  $title = strip_tags($titleog);
  $description = strip_tags($descriptionog, "<b><i><br><code><stong><em><mark><small><del><ins><sub><sup><img><a>");

  $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../submitpost.php?error=sqlerror");
    exit();
  }
  else {
  $sql = "INSERT INTO posts (authorPosts, authorNamePosts, titlePosts, descriptionPosts) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../submitpost.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ssss", $author, $authorog, $title, $description);
      mysqli_stmt_execute($stmt);
      header("Location: ../community.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../submitpost.php");
  exit();
}
