<?php

$configs = include('config.php');

$servername = $configs['host'];
$dBUsername = $configs['username'];
$dBPassword = $configs['password'];
$dBName = $configs['dbname'];

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}