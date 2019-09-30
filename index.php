<?php declare(strict_types=1); ?>
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
      //creating session cookies
      $yourpath = dirname($_SERVER['SCRIPT_NAME']). '/';
      $sessionoptions = [ 'lifetime' => 0, 'path'=> $yourpath,'secure' => TRUE, 'httponly' => TRUE];
      session_set_cookie_params ($sessionoptions);
      session_start();
      session_regenerate_id();
      function killsession(string $cookiepath){
        session_unset(); 
        session_destroy(); 
        setcookie(session_name(),"",time() - 3600, $cookiepath);
      } // killsession($yourpath);
      ?>


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
          }
        ?>
        <br/>
        <input
          name="submit"
          value="Roll Dice"
          type="submit"
        />
      </form>




      <?php
      //display the dice game they clicked submit
      if ( isset ($_POST['submit'])){
        echo '<div class="dice-game">';
        //storing the names for the icons used for the dice
        $diceIconArray = array('dice-d6','dice-one','dice-two','dice-three','dice-four','dice-five','dice-six');
        //declaring an empty array to store the dice rolls
        $diceRolls = array();
        //creating variables to store the number of sides on my dice and the number of dice total
        $numdice = 6;
        $numsides = 6;
        //looping over the dice rolls
        for ( $i = 1; $i <= $numdice; $i++){
            $thisRoll = mt_rand(1,$numsides);
            $diceRolls[] = $thisRoll;
            echo "<div class='dice-container'><i class='fas fa-$diceIconArray[$thisRoll]'></i></div>";
        }
        ?>
        </div>
        
        
          <div class="dice-history">
            <div class="table-wrapper">
            <br/><br/>
            <table>
                <tr>
                    <th>Roll 1</th>
                    <th>Roll 2</th>
                    <th>Roll 3</th>
                    <th>Roll 4</th>
                    <th>Roll 5</th>
                    <th>Roll 6</th>
                    <th>Total</th>
                </tr>
                <?php
                    //loop through past rolls and build table



                    if (isset($_SESSION['pastRolls'])) {
                      //if we're storing more than 10 rolls replace it else push to array
                      if(count($_SESSION['pastRolls']) == 10){
                          $_SESSION['pastRolls'][] = $diceRolls;
                          array_shift($_SESSION['pastRolls']);
                      } else {
                          $_SESSION['pastRolls'][] = $diceRolls;
                      }
                  } else {
                      $_SESSION['pastRolls'] = array($diceRolls);
                      if(isset($_POST['name'])){
                          if(!isset($_SESSION['name'])){
                              $_SESSION['name'] = $_POST['name'];
                          }
                      }
                  }



                    echo 'pastrolls:'.$_SESSION['pastRolls'];
                    for ( $i = 0; $i < count($_SESSION['pastRolls']); $i ++){
                        $rollTotal = 0;
                        echo "<tr>";
                        foreach ($_SESSION['pastRolls'][$i] as $value) {
                            $rollTotal+=$value;
                            echo "<td><i class='fas fa-$diceIconArray[$value]'></i></td>";
                        }
                        echo "<td>$rollTotal</td></tr>";
                    }
                ?>
            </table>
            </div>
        </div>
        <?php
      }
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
