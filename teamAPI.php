<?php
require 'config.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM teams";

$query = $db->query($sql);

$teams = $query->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($teams);