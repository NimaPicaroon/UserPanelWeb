<?php 
ob_start();
require_once 'database.php';
include 'config.php';

if ($esx_legacy) {
    $SQL = $pdo -> prepare("SELECT * FROM `$framework` WHERE `id` = :id");
    $SQL -> execute(array(':id' => $_SESSION['ID']));
    $userid = $_SESSION['ID'];
    $row = $SQL -> fetch();
    $ide = $row['identifier'];

    

    $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$ide' ORDER BY `count` ASC");
    $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$ide' ORDER BY `stored` ASC");
    $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");

    $ranking = $pdo -> query("SELECT * FROM `$framework`");
    $rowrank = $ranking -> fetch();

    if ($moneyjson2) {
        $jsonmoney2 = $row['accounts'];
        $moneyjson2 = json_decode($jsonmoney2);
    }

    if ($moneyjson) {
        $jsonmoney = $row['money'];
        $moneyjson = json_decode($jsonmoney);
    }

    $marketplace = $pdo -> query("SELECT * FROM marketplace");

}

if ($esx_v1final) {
    $SQL = $pdo -> prepare("SELECT * FROM `$framework` WHERE `id` = :id");
    $SQL -> execute(array(':id' => $_SESSION['ID']));
    $userid = $_SESSION['ID'];
    $row = $SQL -> fetch();
    $ide = $row['identifier'];

    $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$ide' ORDER BY `count` ASC");
    $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$ide' ORDER BY `stored` ASC");
    $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");


    $ranking = $pdo -> query("SELECT * FROM `$framework`");
    $rowrank = $ranking -> fetch();

    $jsonchar = $row['charinfo'];
    $charjson = json_decode($jsonchar);

    if ($moneyjson2) {
        $jsonmoney2 = $row['accounts'];
        $moneyjson2 = json_decode($jsonmoney2);
    }

    if ($moneyjson) {
        $jsonmoney = $row['money'];
        $moneyjson = json_decode($jsonmoney);
    }
}

if ($esx_v1) {
    $SQL = $pdo -> prepare("SELECT * FROM `$framework` WHERE `id` = :id");
    $SQL -> execute(array(':id' => $_SESSION['ID']));
    $userid = $_SESSION['ID'];
    $row = $SQL -> fetch();
    $ide = $row['identifier'];

    $inventory = $pdo -> query("SELECT * FROM `user_inventory` WHERE identifier='$ide' ORDER BY `count` ASC");
    $vehicle = $pdo -> query("SELECT * FROM `owned_vehicles` WHERE owner='$ide' ORDER BY `stored` ASC");
    $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");


    $ranking = $pdo -> query("SELECT * FROM `$framework`");
    $rowrank = $ranking -> fetch();

    if ($moneyjson2) {
        $jsonmoney2 = $row['accounts'];
        $moneyjson2 = json_decode($jsonmoney2);
    }

    if ($moneyjson) {
        $jsonmoney = $row['money'];
        $moneyjson = json_decode($jsonmoney);
    }
}


if ($qbcore) {
    $SQL = $pdo -> prepare("SELECT * FROM `$framework` WHERE `id` = :id");
    $SQL -> execute(array(':id' => $_SESSION['ID']));
    $userid = $_SESSION['ID'];
    $row = $SQL -> fetch();
    $ide = $row['citizenid'];
    $license = $row['license'];

    $inventory = $pdo -> query("SELECT inventory FROM `players` WHERE citizenid='$ide'");
    $vehicle = $pdo -> query("SELECT * FROM `player_vehicles` WHERE citizenid='$ide' ORDER BY `plate` ASC");
    $fines = $pdo -> query("SELECT * FROM `billing` WHERE identifier='$ide' ORDER BY `amount` ASC");
    
   // $multichar = $pdo -> query("SELECT * FROM `players` WHERE license = '$license' ORDER BY `cid` ASC"); 

    $ranking = $pdo -> query("SELECT * FROM `$framework`");
    $rowrank = $ranking -> fetch();

    $jsonchar = $row['charinfo'];
    $charjson = json_decode($jsonchar);

    if ($moneyjson2) {
        $jsonmoney2 = $row['accounts'];
        $moneyjson2 = json_decode($jsonmoney2);
    }

    if ($moneyjson) {
        $jsonmoney = $row['money'];
        $moneyjson = json_decode($jsonmoney);
    }
    $jsonjob = $row['job'];
	$jobjson = json_decode($jsonjob);
}




?>