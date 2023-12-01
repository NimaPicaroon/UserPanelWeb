<?php
define('DB_HOST', 'localhost');  // Database Ip and port.
define('DB_NAME', 'nazi');       // Database Name.
define('DB_USERNAME', 'root');   // Database Username.
define('DB_PASSWORD', '');       // Database Password.

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD); // Dont touch this line.

?>