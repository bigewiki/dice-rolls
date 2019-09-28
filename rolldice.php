<?php
    declare(strict_types=1);
    //creating session cookies
    $yourpath = dirname($_SERVER['SCRIPT_NAME']). '/' . "1";
    $sessionoptions = [ 'lifetime' => 0, 'path'=> $yourpath,'secure' => TRUE, 'httponly' => TRUE];
    session_set_cookie_params ($sessionoptions);
    session_start();
    session_regenerate_id();
    function killsession(string $cookiepath){
        session_unset(); 
        session_destroy(); 
        setcookie(session_name(),"",time() - 3600, $cookiepath);
    }
    
    killsession($yourpath);


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
    //add the dice roll or create the session if it doesn't exist
    if ( isset ($_SESSION['pastRolls'])){
        //if we're storing more than 10 rolls replace it
        if(count($_SESSION['pastRolls']) == 10){
            $_SESSION['pastRolls'][] = $diceRolls;
            array_shift($_SESSION['pastRolls']);
        } else {
            $_SESSION['pastRolls'][] = $diceRolls;
        }
    } else {
        $_SESSION['pastRolls'] = array($diceRolls);
    }
    echo "<br/><br/>";
    echo "<table>";
    for ( $i = 0; $i < count($_SESSION['pastRolls']); $i ++){
        $rollTotal = 0;
        foreach ($_SESSION['pastRolls'][$i] as $value) {
            $rollTotal+=$value;
        }
        echo "<tr><td>";
          echo implode("</td><td>",$_SESSION['pastRolls'][$i]);
        echo "</td><td>$rollTotal</td></tr>";
    }
    echo "</table>";

    // echo "<br/><br/>";
    // $input = array("red", "green", "blue", "yellow");
    // array_splice($input, 1);
    // var_dump($input);

?>