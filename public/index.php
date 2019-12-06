<?php
require_once("../private/initialise.php");

include("../private/shared/chess_header.php");

?>
<!doctype html>

<html lang="en">
<head>
    <title>Chess Society</title>
    <meta charset="utf-8">
    <?php require_bootstrap() ?>
    <link rel="stylesheet" href="stylesheets/home.css" type="text/css">
</head>

<body>
    <h1>Chess Society</h1>
    <nav>
        <div class="left-nav">
        <a href="events/index.php">EVENTS</a>
        <a href="news/index.php">NEWS</a>
        <a href="tournaments/index.php">TOURNAMENTS</a>
        </div>
        <div class="right-nav">
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo '<a href="log_in/logout.php">Logout</a>';
        } else {
            echo '<a href="log_in/login.php">Login</a>';
            echo '<a href="log_in/logout.php">Logout</a>';
        }
        ?>
        </div>
    </nav>
    <div class="content">
    <h2>Who are we?</h2>
        <p>
        Whether you’re the next Magnus Carlsen or a complete beginner just hoping to learn the rules of chess, the chess
        society has something for you. In our relaxed weekly sessions beginners will be able to learn the rules
        and basic strategies of the game, while more experienced players can test their skills against worthy opposition.
        </p>
    </div>
  </body>
</html>

<?php include("../private/shared/chess_footer.php"); ?>