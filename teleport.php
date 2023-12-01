<?php 
ob_start();

include 'php/init.php';

$actions -> doTp($pdo);
header('location: profile.php');


?>