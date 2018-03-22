<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'att';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

?>