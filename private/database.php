<?php

require_once('db_credentials.php');

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
}


function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
    }
    
}
 
function confirm_db_connect() {
    if (mysqli_connect_errno()) {
        $message = "database connection failed: " ;
        $message .= mysqli_connect_error();
        $message .= " (" . mysqli_connect_errno() . ")";
        exit ($message);
    }

}
?>