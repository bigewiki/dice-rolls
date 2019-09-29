<div class="dice-history">
    <div class="table-wrapper">
    <?php
    //add the dice roll else create the session if it doesn't exist
        if (isset($_SESSION['pastRolls'])){
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
                $_SESSION['name'] = $_POST['name'];
            }
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
            //loop through past rolls and build table
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