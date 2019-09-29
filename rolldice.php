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
    
    // killsession($yourpath);


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
    

    // echo "<br/><br/>";
    // $input = array("red", "green", "blue", "yellow");
    // array_splice($input, 1);
    // var_dump($input);

?>