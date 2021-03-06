<?php
require 'header.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$names = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM matchups";
$query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
$matches = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen


$admincheck = $db->prepare("SELECT level FROM users WHERE level = 1");
$admincheck->execute();
$admin = $admincheck->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="addteam-wrapper">
    <button><a href="index.php"><i class="fas fa-home"></i></a></button>
    <div class="team-display">
        <h2>Wedstrijd Schema </h2>
        <h3> thuis - uit</h3>
        <div class="schedule-display">

            <ul>
                <?php
                $num_team = sizeof($names);
                $num_week = 3;

                if ($num_team % 2 !=0) {
                    $num_team++;
                }

                $n2 = ($num_team-1)/2;

                for($x = 0; $x < $num_team; $x++) {
                   $teams[$x] = $x+1;
                }

                if ($admin == true)
                {
                     ?> <form action="playerController.php" method="post">
                            <input type="hidden" name="type" value="addmatch">
                    <?php
                        for ($x = 0; $x < $num_week; $x++) {
                            for ($i = 0; $i < $n2; $i++){
                                $team1 = $teams[$n2 - $i];
                                $team2 = $teams[$n2 + $i + 1];
                                $results[$team1][$x] = $team2;
                                $results[$team2][$x] = $team1;
                                $Team1 = $names[$results[$team1][$x] -1]['teamName'];
                                $Team2 = $names[$results[$team2][$x] -1]['teamName'];
                                echo "<input type='text' id='home_team' name='home_team' value='$Team1' disabled>  -  
                                        <input type='text' id='away_team' name='away_team' value='$Team2' disabled> <br>";


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
                            <input type="submit" id="addmatch" value="opslaan">
                        </form>
                    <h2>eindstanden invoeren</h2>
                    <?php

                    foreach ($matches as $match){
                        $teamfilter1 = htmlentities($match['home_team']);
                        $teamfilter2 = htmlentities($match['away_team']);


                        if ($admin == true){

                            echo "<li><a href='results.php?id=".$match['id']."'>$teamfilter1 - $teamfilter2 ".$match['home_score']."-".$match['away_score']." " ." </a></li>";
                        }

                        else{

                            echo "<li> $teamfilter1 - $teamfilter2 ".$match['home_score']."-".$match['away_score']." " ." </li>";
                        }
                    }
                    }

                else{
                    for ($x = 0; $x < $num_week; $x++) {
                        for ($i = 0; $i < $n2; $i++){
                            $team1 = $teams[$n2 - $i];
                            $team2 = $teams[$n2 + $i + 1];
                            $results[$team1][$x] = $team2;
                            $results[$team2][$x] = $team1;
                            $Team1 = $names[$results[$team1][$x] -1]['teamName'];
                            $Team2 = $names[$results[$team2][$x] -1]['teamName'];
                            echo  "<p>" . $Team1 . " VS "  .$Team2 . "</p>" . "<br>" ;

                        }
                        echo "<br>";
                        $tmp = $teams[1];
                        for ($i = 1; $i < sizeof($teams) -1; $i++)
                        {
                            $teams[$i] = $teams[$i+1];
                        }
                        $teams[sizeof($teams)-1] = $tmp;
                    }

                }

?>
            </ul>
        </div>
    </div>
</div>




<?php require 'footer.php'; ?>
