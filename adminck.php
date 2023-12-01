<?php 
ob_start();

include 'php/init.php';

  
  if ($esx_legacy) {
  $ide = $_GET['id'];
  $CK = "DELETE FROM users WHERE identifier = '$ide';
  DELETE FROM user_inventory WHERE identifier ='$ide';
  DELETE FROM owned_vehicles WHERE identifier = '$ide';
  DELETE FROM billing WHERE identifier = '$ide';
  ";
  $SQL = $pdo -> prepare($CK);
  $SQL -> execute();
  header('location: admin.php');
}

if ($esx_v1final) {
    $ide = $_GET['id'];
    $CK = "DELETE FROM users WHERE identifier = '$ide';
  DELETE FROM user_inventory WHERE identifier ='$ide';
  DELETE FROM owned_vehicles WHERE identifier = '$ide';
  DELETE FROM billing WHERE identifier = '$ide';
  ";
    $SQL = $pdo -> prepare($CK);
    $SQL -> execute();
    header('location: admin.php');
}

if ($esx_v1) {
    $ide = $_GET['id'];
    $CK = "DELETE FROM users WHERE identifier = '$ide';
  DELETE FROM user_inventory WHERE identifier ='$ide';
  DELETE FROM owned_vehicles WHERE identifier = '$ide';
  DELETE FROM billing WHERE identifier = '$ide';
  ";
    $SQL = $pdo -> prepare($CK);
    $SQL -> execute();
    header('location: admin.php');
}


if ($qbcore) {
    $citizen = $_GET['id'];
    $CK = "DELETE FROM players WHERE citizenid = '$citizen';
    DELETE FROM player_vehicles WHERE citizenid ='$citizen';
    DELETE FROM player_houses WHERE citizenid = '$citizen';
    ";
    $SQL = $pdo -> prepare($CK);
    $SQL -> execute();
    header('location: admin.php');   
}

echo print_r($_GET['id']);

?>