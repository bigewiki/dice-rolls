<?php
    declare(strict_types=1);
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