<?php
require 'header.php';
?>
<div class="reset-wrapper">
<div class="reset-div">

    <h1>Wachtwoord Herstellen</h1>
    <form action="loginController.php" class="reset-form" method="post">
        <input type="hidden" name="type" value="reset">
        <input type="text" id="username-reset" placeholder="Gebruikersnaam/E-mail">
        <input type="submit" value="Password reset" id="resetButton">
    </form>
</div>

</div>
