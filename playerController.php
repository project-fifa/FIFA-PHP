<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: index.php');
    exit;
}

if ($_POST['type'] === 'addTeam') {
    $teamName = $_POST['Name'];
    $userid = $_GET['id'];
    $sql = "INSERT INTO teams (userId, teamName)
                   VALUES(:userId, :teamName)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
       ':userId'    => $userid,
        ':teamName' => $teamName
    ]);

    $teamId = $db->lastInsertId();
    header('location: addPlayer.php?id=' . $teamId);
    //team in now inserted
    // redirect to addplayer page with team id.

}

if ($_POST['type'] === 'addPlayer') {
    $name = $_POST['name'];
    $id = $_GET['id'];
    $sql = "INSERT INTO player (fullName, teamId)
            VALUES(:fullName, :teamId)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
       ':fullName'  => $name,
       ':teamId'    => $id
    ]);
    header('location: addplayer.php?id=' . $id);
}

if ($_POST['type'] == 'addmatch') {



    $sqldelete = "DELETE FROM matchups";
    $querydel = $db->query($sqldelete); //verzoek naar de database, voer sql van hierboven uit



    $sql = "SELECT * FROM teams";
    $query = $db->query($sql); //verzoek naar de database, voer sql van hierboven uit
    $teams = $query->fetchAll(PDO::FETCH_ASSOC); //multie demensionale array //alles binnenhalen

    $teamsArray = array();

    foreach ($teams as $team) {
        array_push($teamsArray, $team['teamName']);
    }

    $arrLength = count($teamsArray);


    for ( $i = 0; $i < $arrLength; $i++)
    {
        for ($x = 0; $x < count($teamsArray); $x++ )
        {
            if($teamsArray[0] !== $teamsArray[$x])
            {
                $matchsql = "INSERT INTO matchups (home_team, away_team, home_score, away_score)
                        VALUES (:home_team , :away_team, :home_score, :away_score)";
                $prepare = $db->prepare($matchsql);
                $prepare->execute([
                    ':home_team'    => $teamsArray[0],
                    ':away_team'    => $teamsArray[$x],
                ]);
            }
        }
        array_shift($teamsArray);
    }
    //exit;
    header("Location: gameSchedule.php");
}


if ( $_POST['type'] === 'addscore' ) {


    if ($admin == true) {
        header('Location: index.php?error=nopermission');
    }


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: gameSchedule.php');
    }


    $homescore = $_POST['home_score'];
    $awayscore = $_POST['away_score'];

    $score = $homescore . "-" . $awayscore;


    $sql = "UPDATE matchups SET home_score = :result WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':result' => $homescore,
        ':id' => $id
    ]);


    $sql = "UPDATE matchups SET away_score = :result WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':result' => $awayscore,
        ':id' => $id
    ]);
    header('Location: gameSchedule.php?success=result');
}
?>

