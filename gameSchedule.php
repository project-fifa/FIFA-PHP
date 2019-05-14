<?php
require 'header.php';

$num_team = 4;
$num_week = 1;

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
        echo $results[$team1][$x] . " vs " . $results[$team2][$x] . "<br>";

    }
}
?>
<div class="addteam-wrapper">
    <div class="team-display">
    <h2>Wedstrijd Schema </h2>
    <div class="players-display">
        <ul>
            <li></li>
        </ul>
    </div>
</div>




<?php require 'footer.php'; ?>
