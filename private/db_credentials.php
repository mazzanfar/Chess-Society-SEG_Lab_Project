<?php

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] );
define('PRIVATE_DIR', SERVER_ROOT . "/projects/SEG_Lab_Project/private");
define('PUBLIC_DIR', SERVER_ROOT . "/projects/SEG_Lab_Project/public");
require("db_functions.php");

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', null);
define('DB_NAME', 'chess_society_db');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>