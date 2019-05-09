<?php
require 'header.php';
$PlayerSql = "SELECT * FROM player";
$query = $db->query($PlayerSql);
$names = $query->fetchAll(PDO::FETCH_ASSOC);

$TeamSql = "SELECT * FROM teams";
$query = $db->query($TeamSql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="addteam-wrapper">
    <form action="playerController.php" method="post">
    <input type="hidden" name="type" value="addPlayer">
    <div class="addteam-div">
        <div class="team-name">
            <h3>Team Aanmaken</h3>
            <label for="teamName">Team Naam:</label>
            <input type="text" id="teamName" name="teamName">
        </div>
        <div class="new-player">
            <h3>Speler Toevoegen</h3>
            <label for="Name">Volledige Naam:</label>
            <input type="text" id="Name" name="Name">
            <input type="submit" id="addPlayer-button" value="Add">

        </div>
    </form>
        <div class="team-display">
            <?php
            $team = $teams['team-name'];
            echo "<h2>$team</h2>"
            ?>
            <div class="players-display">
                <ul>
                    <?php
                    foreach ($names as $name)
                    {
                        $name = htmlentities($names['fullName']);
                        echo "<li>$name</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    </form>
</div>
<?php require 'footer.php'; ?>
