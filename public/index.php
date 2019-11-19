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
    
    <a href="#">Register</a>
    <a href="#">Login</a>
    
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
  
  <news class="column news">
    
    <h3>News</h3>
    
    <p>
    
    MAJOR EVENT HAPPENING NEXT WEEK 
        
    </p>
    
    
  </news>
  </body>
</html>

<?php include("../private/shared/chess_footer.php"); ?>