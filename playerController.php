<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: index.php');
    exit;
}

if ($_POST['type'] === 'addPlayer') {
 $name = $_POST['Name'];
}

echo $name;
?>