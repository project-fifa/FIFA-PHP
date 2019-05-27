<?php
require 'header.php';

if($_SESSION == false) {
    header('location: login.php');
}

$TeamSql = "SELECT TeamName, id FROM teams";
$query = $db->query($TeamSql);
$teams = $query->fetchAll(PDO:: FETCH_ASSOC);

?>
    <div class="overview-wrapper">
        <div class="overview-header">
        <button><a href="index.php"><i class="fas fa-home"></i></a></button>
        </div>
        <div class="overview-display">
            <h2>Teams</h2>
            <div class="teams-overview-display">
                <ul>
                    <?php
                    foreach ($teams as $team)
                    {
                        $teamname = $team ['TeamName'];
                        echo "<li> <a href='playeroverview.php?id={$team ['id']}'>$teamname</a></li>";

                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

<?php require 'footer.php'?>