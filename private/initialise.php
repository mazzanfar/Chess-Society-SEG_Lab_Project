<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once("db_functions.php");
require_once("db_dev_credentials.php");
require_once('validation_functions.php');

$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start()
?>