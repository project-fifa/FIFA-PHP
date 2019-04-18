<?php
require 'config.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM users";

$query = $db->query($sql);

$users = $query->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($users);
