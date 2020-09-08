<?php
session_start();
$configs = include('config.php');

if (isset($_POST['delete-submit'])) {

  $link = mysqli_connect("localhost", "uhhelumy_crgmg", "Q0pPZ2Q&ba%QV19r", "uhhelumy_crgid");
  if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  } 

  require 'authprof.inc.php';

  $stmt = $con->prepare('SELECT idUsers FROM users WHERE idUsers = ?');
            
  $stmt->bind_param('i', $_SESSION['id']);
  $stmt->execute();
  $stmt->bind_result($idUsers);
  $stmt->fetch();
  $stmt->close();

  if(isset($idUsers)){
    $sql = "DELETE FROM users WHERE idUsers = ".$idUsers;

    if(mysqli_query($link, $sql)){
      echo "Records were deleted successfully.";
      session_start();
      session_unset();
      session_destroy();
      header ("Location: ../index.php");

    } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
   }
   else{
     echo("Critical Error: User you are trying to delete is undefined.");
   }

  mysqli_close($link);
}
else {
  header("Location: ../profile.php");
  exit();
}
?>