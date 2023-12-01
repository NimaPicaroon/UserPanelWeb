<?php 
ob_start();

include 'php/init.php';

$actions -> doCk($pdo);
@session_start();
session_destroy();
header('location: index.php');


?>