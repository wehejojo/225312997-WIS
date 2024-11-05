<?php
  include 'db.php';

  $sql = "SELECT * FROM moments";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moment Cards</title>
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
    table{
      width: 50%;
      border-collapse: collapse;
    }
    td, th{
      border: 1px solid #fff;
      text-align: left;
      padding: 8px;
    }

  </style>
</head>
<body>
  <h1>Moment Cards</h1>
  <table>
    <tr>
      <th>Moment Title</th>
      <th>Moment Description</th>
      <th>Remove</th>
      <th>Update</th>
    </tr>
    <?php
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $row["title"] . "</td>";
          echo "<td>" . $row["body"] . "</td>";
          echo '<td><a href="delete.php?id=' . $row["entry_id"] . '">Delete the Moment</a></td>';
          echo '<td><a href="edit.php?entry_id=' . $row["entry_id"] . '">Edit the Moment</a></td>';
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='2'>No Moments at the moment</td></tr>";
      }
    ?>
  </table><br>
  <a href="add.php">Add New Moment</a>
</body>
</html>