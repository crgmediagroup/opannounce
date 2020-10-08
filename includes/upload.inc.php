<?php
$configs = include('config.php');
session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $nameofimage = $_POST['name'];
    $altofimage = $_POST['alt'];

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../img/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='The file was successfully uploaded. To use the image in a post, use the following markdown:<br><code>![image alt text]('.$configs['protocol'].$configs['installdirectory'].'img/'.$newFileName.')</code>';
        
        require 'dbh.inc.php';

        $sql = "INSERT INTO uploads (nameUploads, pathUploads, altUploads) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo $conn->error;
          exit();
        }
        else {
          $path = $configs['protocol'].$configs['installdirectory'].'img/'.$newFileName;
          mysqli_stmt_bind_param($stmt, "sss", $nameofimage, $path, $altofimage);
          mysqli_stmt_execute($stmt);
        }
      
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }
      else 
      {
        $message = 'There was an error moving the file to the upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There was an error uploading the file. Please see the error below.<br>';
    $message .= 'Error: ' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: ../upload.php");