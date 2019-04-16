<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 15/04/2019
 * Time: 09:27
 */
require 'header.php';
?>
<div class="register-wrapper">

    <div class="register-div">
        <h1>Maak uw Account!</h1>
        <form action="loginController.php" method="post">
            <input type="hidden" name="type" value="register">
            <input type="text" placeholder="Voornaam" name="firstname" id="firstname">
            <input type="text" placeholder="Achternaam" name="lastname" id="lastname">
            <input type="text" placeholder="Gebruikersnaam" name="username" id="username">
            <input type="text" placeholder="Email" name="email" id="email">
            <input type="password" placeholder="Wachtwoord" name="password" id="password">
            <input type="password" placeholder="Wachtwoord Herhalen" name="passwordConfirm" id="passwordConfirm">
            <input type="submit" name="submit"id="register-button" value="Klaar!">
        </form>
        <p>Al een account? <a href="login.php">Klik Hier!</a></p>
    </div>

</div>
