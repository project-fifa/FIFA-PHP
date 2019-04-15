<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 15/04/2019
 * Time: 09:27
 */
require 'header.php';
?>
<form action="loginController.php" method="post">
    <input type="hidden" name="type" value="register">
    <div class="form-group">
        <label for="username">gebruikersnaam</label>
        <input type="text" name="username" id="username">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="password">wachtwoord</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="form-group">
        <label for="password_confirm">Bevestig Wachtwoord</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>
    <input type="submit" name="submit" value="submit" />
    <p>Al een account?<a href="login.php">Login</a></p>
</form>
