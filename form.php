<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
    <?php
        if (!isset($_POST['name']) || isset ($_POST['reset'])){
        killsession($yourpath);
    ?>
    <label for="name">Welcome! What's your name?</label>
    <br/>
    <input
        name="name"
        type="text"
        id="name"
        required
    />
    <?php
        } else {
            echo '<input type="hidden" id="name" name="name" value='.$_SESSION['name'].'>';
            if(!isset($_SESSION['name'])){
                $_SESSION['name'] = $_POST['name'];
                echo "<p>Welcome ".$_POST['name']."! We'll keep track of your rolls for you.</p>";
            } else {
                echo "<p>Back again, ".$_SESSION['name']."? Want to roll again?</p>";
            }
        }
    ?>
<br/>
<input
    name="rollDice"
    value="Roll Dice"
    type="submit"
/>
<input
    name="reset"
    value="Give Up"
    type="submit"
/>
</form>