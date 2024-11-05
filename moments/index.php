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
    }
    body{
      height: 100vh;
      width: 100vw;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;

      background: darkslateblue;
      color: white;
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
    </tr>
    <?php
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $row["title"] . "</td>";
          echo "<td>" . $row["body"] . "</td>";
          echo '<td>Delete</td>';
          echo "<tr>";
        }
      } else {
        echo "<tr><td colspan='2'>No Moments at the moment</td></tr>";
      }
    ?>
  </table>
</body>
</html>