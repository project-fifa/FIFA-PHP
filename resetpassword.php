<?php
require 'header.php';
?>
<div class="reset-wrapper">
    <div class="reset-div">

        <h1>Wachtwoord Herstellen</h1>
        <form action="loginController.php" class="reset-form" method="post">
            <input type="hidden" name="type" value="resetpassword">
            <input type="text" id="password-reset" placeholder="New password">
            <input type="text" id="password2-reset" placeholder="Confirm new password">
            <input type="submit" value="Klaar!" id="resetButton">
        </form>
    </div>

</div>