<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
  <?php
    if(!isset($_SESSION['name']) && !isset($_POST['name'])){
      ?>
      <label for="fname">What's your name?</label>
      <br/>
      <input
        name="name"
        type="text"
        id="name"
        required
      />
      <?php
    } else {
      echo "<p>Welcome back, ".$_SESSION['name']."! Want to roll again?</p>";
      echo "<input type='hidden' id='name' name='name' value=".$_SESSION['name'].">";
    }
  ?>
  <br/>
  <input
    name="submit"
    value="Roll Dice"
    type="submit"
  />
</form>
