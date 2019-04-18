<?php
session_destroy();
echo '<p> Je bent uitgelogt <a href="login.php">ga terug!</a></p>';
header('location: login.php');
?>