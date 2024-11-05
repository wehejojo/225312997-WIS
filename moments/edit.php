<?php
  include 'db.php';

  $title = '';
  $body = '';

  if(isset($_GET["entry_id"])){
      $id = intval($_GET["entry_id"]);

      $sql = "SELECT * FROM moments WHERE entry_id = $id";
      $result = $conn->query($sql);

      if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          $title = $row["title"];
          $body = $row["body"];
      } else {
          echo "No moments with id: " . $id;
          exit;
      }
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["entry_id"])){
      $id = intval($_POST["entry_id"]);
      $title = mysqli_real_escape_string($conn, $_POST["title"]);
      $body = mysqli_real_escape_string($conn, $_POST["body"]);

      if(!empty($title) && !empty($body)){
        $query = "UPDATE moments SET title='$title', body='$body' WHERE entry_id=$id;";
        if($conn->query($query) === TRUE){
          if ($conn->affected_rows > 0) {
              echo "Moment has been successfully updated.";
          } else {
              echo "No rows were updated. The values may be the same as existing ones.";
          }
        } else {
            echo "Could not moment the moment: " . $conn->error;
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
    <title>Edit a Moment</title>
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
    <h1>Edit a New Moment Card</h1>
    <form action="edit.php" method="post">
        <input type="hidden" name="entry_id" value="<?php echo htmlspecialchars($id); ?>">
        Title: <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>"><br>
        Descr: <input type="text" name="body" value="<?php echo htmlspecialchars($body); ?>"><br><br>
        <input type="submit" value="Edit Moment Card">
    </form>
    <a href="index.php">Back to Moment Cards</a>
</body>
</html>
