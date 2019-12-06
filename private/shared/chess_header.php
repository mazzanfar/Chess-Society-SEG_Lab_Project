<?php
echo '
    <link rel="stylesheet" href="../../public/stylesheets/header.css" type="text/css">
    <h1 class="header-title"><a href="../../public/">Chess Society</a></h1>
    <nav class="header-nav">
        <div class="header-left-nav">
        <a class="header-link" href="../../public/events/index.php">EVENTS</a>
        <a class="header-link" href="../../public/news/index.php">NEWS</a>
        <a class="header-link" href="../../public/tournaments/index.php">TOURNAMENTS</a>
        </div>
        <div class="header-right-nav">';
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<a class="header-link" href="../../public/log_in/logout.php">Logout</a>';
        } else {
            echo '<a class="header-link" href="../../public/log_in/login.php">Login</a>';
            echo '<a class="header-link" href="../../public/log_in/register.php">Register</a>';
        }

echo"    </div>
    </nav>";
?>
