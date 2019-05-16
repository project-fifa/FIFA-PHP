<?php
require 'header.php';

if($_SESSION == false) {
    header('location: login.php');
}

$teamId =($_GET['id']);
$PlayerSql = "SELECT FullName FROM player WHERE teamId = :teamId ";
$prepare =$db->prepare($PlayerSql);
$prepare->execute([
    ':teamId' => $teamId
]);
$players = $prepare->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="overview-wrapper">
    <div class="overview-header">
        <button><a href="index.php"><i class="fas fa-home"></i></a></button>
    </div>
    <div class="overview-display">
        <h2>Players</h2>
        <div class="teams-overview-display">
            <ul>
                <?php
                foreach ($players as $player)
                {

                    echo "<li> {$player ['FullName']}</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>




<?php require 'footer.php' ?>
