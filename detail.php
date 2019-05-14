<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 15/04/2019
 * Time: 09:40
 */

require 'header.php'; ?>

<div class="homepage-wrapper">
    <div class="homepage-header">
        <button><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
    </div>
    <div class="homepage-content">
        <div class="games-teams-div">
            <h1>Zie alle teams</h1>
            <img src="style/images/soccerteam.jpeg" alt="soccer team">
            <p>zie alle teams die meedoen aan het toernooi!</p>
            <a href="teamsoverwiew.php">Teams</a>
        </div>
        <div class="games-teams-div">
            <h1>zie alle wedstrijden</h1>
            <img src="style/images/soccergame.jpg" alt="soccer game">
            <p>kijk tegen wie en hoelaat je moet spelen.</p>
            <a href="gameSchedule.php">wedstrijd schema</a>
        </div>
    </div>
</div>


<?php require 'footer.php'; ?>
