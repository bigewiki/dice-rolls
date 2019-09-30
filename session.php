<?php
    declare(strict_types=1);
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