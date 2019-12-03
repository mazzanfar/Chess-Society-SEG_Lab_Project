<?php
require_once("../private/initialise.php");

include("../private/shared/chess_header.php");

?>
<!doctype html>

<html lang="en">
<head>
    <title>Chess Society</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheets/welcomepage.css" type="text/css">
    <h1 class="head">Chess Society</h1>

    <div class="nav">

    <a href="log_in/register.php">Register</a>
    <a href="log_in/login.php">Login</a>
    <a href="log_in/logout.php">Logout</a>

    </div>

  </head>

<body>
<whoarewe class="column whoarewe">
    <h2>Who are we ?</h2>

    <p>
    Whether you’re the next Magnus Carlsen or a complete beginner
    just hoping to learn the rules of chess,<br> the chess
    society has something for you. In our relaxed
    weekly sessions beginners will be able to learn <br> the rules
    and basic strategies of the game, while more experienced players
    can test their skills against worthy opposition.
    </p>

  </whoarewe>
    <div id="events">
        <a href="events/index.php">EVENTS</a>
    </div>
    <div id="news">
        <a href="news/index.php">NEWS</a>
    </div>
    <div id="tournaments">
        <a href="tournaments/index.php">TOURNAMENTS</a>
    </div>

  </body>
</html>

<?php include("../private/shared/chess_footer.php"); ?>