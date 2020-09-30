<?php

  $majors = (object) array('CS' => 'Computer Science', 'WDD' => 'Web Design and Development', 'CIT' => 'Computer Information Technology', 'CE' => 'Computer Engineering');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 3 Team Activity</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <div class="container">  
  <form id="contact" action="result.php" method="post">
    <h3>Week 3 Team Activity</h3>

    <fieldset>
    <label>Name:
      <input placeholder="Your name" name="name" type="text" tabindex="1" required autofocus>
    </label>
    </fieldset>

    <fieldset>
    <label>Email:
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </label>
    </fieldset>

    <fieldset>

    <p>Major:</p>
    <?php
        foreach ($majors as $abbreviation => $name) {
          echo "<label><input type='radio' name='major' value='$abbreviation'> $name </label> <br>";
        }
    ?>
    </fieldset>

    <fieldset>
    <label>Comments:
        <textarea name="comments" placeholder="Comments" tabindex="4"></textarea>
    </label>
    </fieldset>
    
    <fieldset>
    <p>Continents visited:</p>
      <label>
        <input type="checkbox" name="continents[]" value="NA">
        North America 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="SA">
        South America 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Eu">
        Europe 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="As">
        Asia 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Au">
        Australia 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Af">
        Africa 
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="An">
        Antarctica 
      </label>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
    
  </body>
</html>
