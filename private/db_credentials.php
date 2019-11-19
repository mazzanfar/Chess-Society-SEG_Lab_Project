<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
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

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chess_society_db');
?>