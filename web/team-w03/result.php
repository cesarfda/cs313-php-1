<?php

  $name = $_POST["name"];
  $email = $_POST["email"];
  $major = $_POST["major"];
  $comments = $_POST["comments"];
  $continents = $_POST["continents"];

  $continent_names = array('NA' => 'North America', 'SA' => 'South America', 'Eu' => 'Europe', 'As' => 'Asia', 'Au' => 'Australia', 'Af' => 'Africa', 'An' => 'Antarctica');


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 3 Team Activity</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <h2><b>Name:</b> <?= $name ?></h2>
    <h2><b>Email:</b> <a href="mailto:<?= $email ?>"><?= $email ?></a></h2>
    <h2><b>Major:</b> <?= $major ?></h2>
    <h2><b>Comments:</b> <?= $comments ?></h2>

    <ul>
      <h2>Visited continents:</h2>
      <?php
        foreach ($continents as $continent) {
          $the_continent = $continent_names[$continent];
          echo "<li> - $the_continent</li>";
        }
      ?>
    </ul>

  </body>
</html>
