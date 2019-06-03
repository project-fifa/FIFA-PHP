<?php require 'header.php';

$sql = "SELECT home_team, away_team FROM matchups";
$query = $db->query($sql);
$matches = $query->fetchAll(PDO:: FETCH_ASSOC);

if($_SESSION == false) {
    header('location: login.php');
}
?>

    <div class="addteam-wrapper">
        <div class="team-display">
            <h2>eindstanden invullen </h2>
            <div class="schedule-display">
                <ul>
                    <form action="playerController.php" method="post">
                        <input type="hidden" name="type" value="addscore">
                    <?php
                    foreach ($matches as $match)
                    {
                        $awayteam = $match ["away_team"];
                        $hometeam = $match ["home_team"];
                        echo "<p>$hometeam vs $awayteam</p> <br>";

                        echo "<input type='text' id='home_score' name='home_score'> 
                                        <input type='text' id='away_score' name='away_score'> <br>";
                    }

                    ?>
                        <input type="submit" id="addscore" value="invoeren">
                    </form>
                </ul>
            </div>
        </div>
    </div>

<?php require 'footer.php'; ?>
