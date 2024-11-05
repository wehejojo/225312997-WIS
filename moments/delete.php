<?php
  include 'db.php';

  if (isset($_GET["entry_id"])) {
      $id = intval($_GET["entry_id"]);

      $sql = "DELETE FROM moments WHERE entry_id = $id";
      echo $sql;
      if ($conn->query($sql) === TRUE) {
          echo "This moment has left.";
      } else {
          echo "The moment is inevitable, cannot delete: " . $conn->error;
      }
  }
  header("Location: index.php");
  exit;
?>
