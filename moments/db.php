<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moment_db";
  $port = 3307;

  $conn = new mysqli($servername, $username, $password, $dbname, $port);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $conn->autocommit(TRUE);
?>
