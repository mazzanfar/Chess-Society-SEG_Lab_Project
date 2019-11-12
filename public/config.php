<?php

//require("../");

/*
CREATE TABLE users (
    ->
    ->     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ->
    ->     username VARCHAR(50) NOT NULL UNIQUE,
    ->
    ->     password VARCHAR(255) NOT NULL,
    ->
    ->     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ->
    -> );
 */

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PRIVATE_DIR', SERVER_ROOT . "/private");
//include(PRIVATE_DIR . "/db_functions.php");

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

//require_once "../private/db_functions.php";

?>