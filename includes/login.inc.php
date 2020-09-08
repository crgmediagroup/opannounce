<?php
$configs = include('config.php');
if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  $mailuid1 = $_POST['mailuid'];
  $password1 = $_POST['pwd'];

  $mailuid = str_replace("'", "", $mailuid1);
  $password = str_replace("'", "", $password1);

  if (empty($mailuid) || empty($password)) {
    header("Location: ../login.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        if ($pwdCheck == false) {
          header("Location: ../login.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          header("Location: ../index.php");
          exit();
        }
      }
      else {
        header("Location: ../login.php?login=wronguidpwd");
        exit();
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../register.php");
  exit();
}
