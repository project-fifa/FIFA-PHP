<?php
require 'header.php';

$sql = $db->prepare("SELECT teamName FROM teams");
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$team = array($result);

function scheduler($teams){
    if (count($teams)%2 != 0){
        array_push($teams,"Teams");
    }
    $uit = array_splice($teams,(count($teams)/2));
    $thuis = $teams;
    for ($i=0; $i < count($thuis)+count($uit)-1; $i++){
        for ($j=0; $j<count($thuis); $j++){
            $round[$i][$j]["teamName"]=$thuis[$j];
            $round[$i][$j]["teamName"]=$uit[$j];
        }
        if(count($thuis)+count($uit)-1 > 2){
            array_unshift($uit,array_shift(array_splice($thuis,1,1)));
            array_push($thuis,array_pop($uit));
        }
    }
    return $round;
}

?>
<div class="addteam-wrapper">
    <div class="team-display">
    <h2>Wedstrijd Schema </h2>
    <div class="players-display">
        <ul>
            <?php
            $schedule = scheduler($team);
            foreach ($schedule AS $round => $games){
                echo "Ronde " . ($round+1) . "<br>";
                foreach ($games AS $play){
                    echo $play["teamName"] . " - " . $play["teamName"]."<br>";
                }
                echo "<br>";
            }
            ?>
        </ul>
    </div>
</div>




<?php require 'footer.php'; ?>
