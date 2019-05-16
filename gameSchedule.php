<?php
require 'header.php';

$sql = "SELECT teamName FROM teams";
$query = $db->query($sql);
$names = $query->fetchAll(PDO::FETCH_ASSOC);

$num_team = sizeof($names);
$num_week = 3;

if ($num_team % 2 !=0) {
    $num_team++;
}

$n2 = ($num_team-1)/2;

for($x = 0; $x < $num_team; $x++) {
    $teams[$x] = $x+1;
}



for ($x = 0; $x < $num_week; $x++) {
    for ($i = 0; $i < $n2; $i++){
        $team1 = $teams[$n2 - $i];
        $team2 = $teams[$n2 + $i + 1];
        $results[$team1][$x] = $team2;
        $results[$team2][$x] = $team1;
        $Team1 = $names[$results[$team1][$x] -1]['teamName'];
        $Team2 = $names[$results[$team2][$x] -1]['teamName'];
        echo $Team1 . " vs " . $Team2 . "<br>";
    }
    echo "<br>";
    $tmp = $teams[1];
    for ($i = 1; $i < sizeof($teams) -1; $i++)
    {
        $teams[$i] = $teams[$i+1];
    }
    $teams[sizeof($teams)-1] = $tmp;
}

?>
<div class="addteam-wrapper">
    <div class="team-display">
    <h2>Wedstrijd Schema </h2>
    <div class="players-display">
        <ul>
            <?php
                echo $Team1 . " vs " . $Team2 . "<br>";
                echo "<br>";
                $tmp = $teams[1];
                 for ($i = 1; $i < sizeof($teams) -1; $i++)
                {
                    $teams[$i] = $teams[$i+1];
                }
                $teams[sizeof($teams)-1] = $tmp;
            ?>
        </ul>
    </div>
</div>




<?php require 'footer.php'; ?>
