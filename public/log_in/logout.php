<?php
require_once("../../private/initialise.php");
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to home page
redirect_to("/index.php");
?>


