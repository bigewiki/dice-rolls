<?php
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
?>
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
?>