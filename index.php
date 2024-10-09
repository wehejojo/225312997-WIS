<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <header class="header">
    <h1>MOMENT</h1>
  </header>
  <main>
    <?php
      $moments = array(
        "Moment 1" => "The very first of moments, Where it all started.",
        "Moment 2" => "The second movement of the moment, The uprising.",
        "Moment 3" => "The finest of all the moments, Truly the moment.",
        "Moment 4" => "The fall of the moment, It's just such a moment.",
        "Moment 5" => "Now I have become moment, The moment of moments."
      );

      echo "<dl>";
      foreach ($moments as $moment => $desc) {
        echo '<div class="container">';
        echo '<dt style="font-weight: bold;">'.$moment.'</dt>';
        echo '<dd>'.$desc.'</dd>';
        echo '</div>';
      }
      echo "</dl>";
    ?>
  </main>
  <footer></footer>
</body>
</html>