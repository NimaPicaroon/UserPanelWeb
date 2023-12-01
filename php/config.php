<?php 

// Framework Config.
$qbcore = false;                                    //Qbcore Mode.
$esx_legacy = true;                                 //Esx Legacy Mode.
$esx_v1final = false;                               //Esx V1 Final Mode.
$esx_v1 = false;                                    //Esx V1 Mode.

// Widgets Config.
$profilepicture = true;                             //Profile Picture.
$battlepass = true;                                 //Battle Pass XP (Widget).
$petwidget = true;                                  //Pet (Widget).
$whitelistwidget = false;                           //Whitelist Option.
$weaponmenu = true;                                 //Weapon license Option.
$ckmenu = true;                                     //CK Option.
$teleportmenu = true;                               //Teleport Option.
$fines = true;                                      //Fines Option.
$vehicles = true;                                   //Vehicles Option.
$inventory = false;                                 //Inventory Option.
$jobs = false;                                      //Jobs Option.
$phonemenu = true;                                  //Phonebook Option.
$serverwidget = true;                               //Server Widget (Profile).
$inventory = true;                                  //Inventory (Widget).
$teleport = '{"z":75.77,"y":3680.05,"x":39.74}';    //Cords for TP.

// Tebex Config.
$productionkey  = 'tbx-6234022a56626-00cb2e';                   //Your TBX BUY ID.
$developmentkey = 'dev-61214022a56626-00cb2e';                  //Your TBX BUY ID.

// Money System.
$moneyjson = false;                //(If your "Money" column looks like this -> "{"cash":500,"crypto":0,"bank":5000}").
$simplemoney = true;               //(If your "Money" column looks like this "5000").
$moneyjson2 = false;               //(If your "Accounts" column looks like this -> "{"bank":500,"crypto":0,"money":5000}").

// Inventory System.
$inventoryjson = false;            //(If your inventory uses the "user_inventory" table).
$simpleinventory = true;           //(If your inventory uses the "Inventory" column in Players/Users).














// Don't Touch.

 if ($qbcore) {
     return $framework = "players";
 }
 if ($esx_legacy) {
     return $framework = "users";
 }
 if ($esx_v1final) {
     return $framework = "users";
 } 
 if ($esx_v1) {
     return $framework = "users";
 }








       
?>
