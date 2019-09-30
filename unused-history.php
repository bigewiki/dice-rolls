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