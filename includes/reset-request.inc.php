<?php

$configs = include('config.php');
if (isset($_POST["reset-request-submit"])) {

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  $url = "https://'.$configs['site'].'/admin/changepassword.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;

  require 'dbh.inc.php';

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Error";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Error";
    exit();
  } else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  $to = $userEmail;

  $subject = $configs['sitename'].'Password Reset';

  $message = '<p>The '.$configs['sitename'].' Account associated with this email\'s password has been requested to be reset. The reset link is below. If you did not make this request, please ignore this email.</p>';
  $message .= '<p>Here is the link to reset your password: </br>';
  $message .= '<a href="' . $url . '">' . $url . '</a></p>';

  $headers = "From: '.$configs['sitename'].' Admin <admin@'.$configs['site'].'.com>\r\n";
  $headers = "Reply-To: admin@'.$configs['site'].'\r\n";
  $headers = "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);

  header("Location: ../resetpassword.php?reset=success");

} else {
  header("Location: ../index.php");
}