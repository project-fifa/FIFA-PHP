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
?>

