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

$admincheck = $db->prepare("SELECT level FROM users WHERE level = 1");
$admincheck->execute();
$admin = $admincheck->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="homepage-wrapper">
    <div class="homepage-header">
        <button><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
        <?php
         if($admin == true){
            echo "<button><a href='gameSchedule.php'>Wedstrijd aanmaken</a></button>";
         }
        ?>
    </div>
    <div class="homepage-content">
        <div class="app-download">
            <h1>Info!</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi debitis delectus ipsa nulla possimus suscipit unde voluptates! Assumenda atque beatae corporis eius exercitationem facere mollitia omnis optio quae tempora, velit?
            </p>
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
