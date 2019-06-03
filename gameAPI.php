<?php
require 'config.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM matchups";

$query = $db->query($sql);

$matchup = $query->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($matchup);
