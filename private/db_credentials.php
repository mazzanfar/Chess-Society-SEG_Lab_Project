<?php

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] );
define('PRIVATE_DIR', SERVER_ROOT . "/private");
define('PUBLIC_DIR', SERVER_ROOT . "/public");
require(PRIVATE_DIR . "/db_functions.php");
require(PRIVATE_DIR . "/functions.php");

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'user');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'db');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>