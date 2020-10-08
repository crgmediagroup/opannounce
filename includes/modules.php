<?php
/*Hi there! For info on how to use these please see the docs.*/

function getNewestPost() {
  $configs = include('config.php');

  $DATABASE_HOST = $configs['host'];
  $DATABASE_USER = $configs['username'];
  $DATABASE_PASS = $configs['password'];
  $DATABASE_NAME = $configs['dbname'];

  $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts, descriptionPosts, thumbnailPosts FROM posts ORDER BY idPosts DESC LIMIT 1');

  $stmt->execute();
  $stmt->bind_result($author, $authorname, $date, $title, $id, $content, $thumbnail);
  $stmt->fetch();
  $stmt->close();

  $thumbnail = $configs['protocol'].$configs['installdirectory'].$thumbnail;

  return array(
    'author' => $author,
    'authorname' => $authorname,
    'date' => $date,
    'title' => $title,
    'id' => $id,
    'content' => $content,
    'thumbnail' => $thumbnail,
  );
}

function getSecondPost() {
  $configs = include('config.php');

  $DATABASE_HOST = $configs['host'];
  $DATABASE_USER = $configs['username'];
  $DATABASE_PASS = $configs['password'];
  $DATABASE_NAME = $configs['dbname'];

  $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts, descriptionPosts, thumbnailPosts  FROM posts ORDER BY idPosts DESC LIMIT 1, 1');

  $stmt->execute();
  $stmt->bind_result($author, $authorname, $date, $title, $id, $content, $thumbnail);
  $stmt->fetch();
  $stmt->close();

  $thumbnail = $configs['protocol'].$configs['installdirectory'].$thumbnail;

  return array(
    'author' => $author,
    'authorname' => $authorname,
    'date' => $date,
    'title' => $title,
    'id' => $id,
    'content' => $content,
    'thumbnail' => $thumbnail,
  );
}

function getThirdOrMorePost($number) {
  $numbertominus = $number;
  if (!is_int($numbertominus) || 3 > $numbertominus) {
    echo 'Not an integer / must be 3 or higher';
    return;
  }

  $numbertominus -= 1;

  $configs = include('config.php');

  $DATABASE_HOST = $configs['host'];
  $DATABASE_USER = $configs['username'];
  $DATABASE_PASS = $configs['password'];
  $DATABASE_NAME = $configs['dbname'];

  $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_errno()) {
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  $stmt = $con->prepare('SELECT authorPosts, authorNamePosts, datePosts, titlePosts, idPosts, descriptionPosts, thumbnailPosts  FROM posts ORDER BY idPosts DESC LIMIT '.$numbertominus.', 1');

  $stmt->execute();
  $stmt->bind_result($author, $authorname, $date, $title, $id, $content, $thumbnail);
  $stmt->fetch();
  $stmt->close();

  $thumbnail = $configs['protocol'].$configs['installdirectory'].$thumbnail;

  return array(
    'author' => $author,
    'authorname' => $authorname,
    'date' => $date,
    'title' => $title,
    'id' => $id,
    'content' => $content,
    'thumbnail' => $thumbnail,
  );
}  

function getPostWithId($id) {
  $idToGet = $id;

  require 'includes/authprof.inc.php';

  $stmt = $con->prepare('SELECT authorPosts, datePosts, titlePosts, descriptionPosts, idPosts, thumbnailPosts FROM posts WHERE idPosts = '.$idToGet);
  
  $stmt->execute();
  $stmt->bind_result($author, $date, $title, $content, $id, $thumbnail);
  $stmt->fetch();
  $stmt->close();

  $thumbnail = $configs['protocol'].$configs['installdirectory'].$thumbnail;

  require 'includes/authprof.inc.php';

  $stmt = $con->prepare('SELECT uidUsers FROM users WHERE idUsers = '.$author);
  
  $stmt->execute();
  $stmt->bind_result($authorname);
  $stmt->fetch();
  $stmt->close();

  return array(
    'author' => $author,
    'authorname' => $authorname,
    'date' => $date,
    'title' => $title,
    'id' => $id,
    'content' => $content,
    'thumbnail' => $thumbnail,
  );
}
