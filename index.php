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
    <div class="homepage-header">
        <button><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
    </div>
    <div class="homepage-content">
        <div class="app-download">
            <h1>Download de App!</h1>
            <img src="https://via.placeholder.com/550x350" alt="">
            <p>Wed op je favoriete team en word rijk!</p>
            <button>Download</button>
        </div>
        <div class="new-team">
            <h1>Speel mee met je eigen Team!</h1>
            <p>Schrijf jezelf en je teamgenoten in voor dit spanningwekkend voetbaltoernooi en word samen met je team kampioen van het Radius College!</p>
            <a href="addTeam.php?id=<?=$_SESSION['id'];?>">Nieuw Team</a>
            <a href="detail.php?id=<?=$_SESSION['id'];?>">Teams Bekijken</a>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
