<?php
/**
 * Created by PhpStorm.
 * User: Sem40
 * Date: 15/04/2019
 * Time: 09:39
 */

require 'header.php';
if($_SESSION == false) {
    header('location: login.php');
}
?>

<div class="homepage-wrapper">
    <div class="app-download">
        <h1>Download de App!</h1>
        <img src="https://via.placeholder.com/550x350" alt="">
        <p>Wed op je favoriete team en word rijk!</p>
        <?php
        if ($_SESSION == true){
            ?><button>Download</button><?php
        }
        else {
            ?><a href="login.php"><p>Login om te downloaden!</p></a><?php
        }
        ?>


    </div>
    <div class="new-team">
        <h1>Speel mee met je eigen Team!</h1>
        <p>Schrijf jezelf en je teamgenoten in voor die spanningwekkend voetbaltoernooi en word samen met je team kampioen van het Radius College!</p>
        <a href="addTeam.html">Nieuw Team</a>
    </div>
</div>
