<?php
  include 'db.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $body = $_POST["body"];

    if(!empty($title) && !empty($body)){
      $sql = "INSERT INTO moments (title, body) VALUES ('$title', '$body');";

      if($conn->query($sql) == TRUE){
        echo "A new Moment has arrived.";
      } else {
        echo "This might  n o t  be the moment";
      }
    } else {
      echo "Fill out all the moments first";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a Moment</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;

      font-family: 'Courier New', Courier, monospace;
      color: white;
    }
    body{
      height: 100vh;
      width: 100vw;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;

      background: darkslateblue;
    }
    h1{
      text-align: center;
    }
    form{
      margin: 30px;
    }
    input{
      color: black;
    }
    input[type=submit]{
      padding: 3px;
      border: 0;
    }
  </style>
</head>
<body>
  <h1>Add a New Moment Card</h1>
  <form action="add.php" method="post">
    Title: <input type="text" name="title"><br>
    Descr: <input type="text" name="body"><br><br>
    <input type="submit" value="Add Moment Card">
  </form>
  <a href="index.php">Back to Moment Cards</a>
</body>
</html>