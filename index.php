<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Roll the dice!</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="dcterms.rightsHolder" content="Edward M" />
    <meta name="dcterms.dateCopyrighted" content="2019" />
    <meta name="description" content="Rolling dice!" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://kit.fontawesome.com/9bf2aeb3dd.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1>Roll The Dice!</h1>
      <?php
        include('session.php');
        include('form.php');
        include('dice-game.php');
      ?>
    <footer>
      <div id="validator"></div>
      <script>
        document.getElementById(
          "validator"
        ).innerHTML = `<a href="http://validator.w3.org/nu/?doc=${window.location.href}" target="_blank">HTML 5 Validation</a>`;
      </script>
    </footer>
  </body>
</html>
