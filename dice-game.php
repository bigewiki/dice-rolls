<?php
    //killing session if they reset
    if (isset ($_POST['reset'])) {
    killsession($yourpath);
    //if they clicked roll display the dice game
    } else if ( isset ($_POST['rollDice'])){
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