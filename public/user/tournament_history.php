<?php
require_once "../../private/initialise.php";
?>

<html>
<head>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
    <title>My tournaments</title>
</head>
<body>
<h1>Tournaments participated in</h1>
<a href="../">Back to home page</a>
<br/>

<div id="events">
    <?php
    $tournaments = get_tournaments_participated_in($_SESSION['id']);
    if (count($tournaments) > 0) {
        foreach ($tournaments as $tournament_id) {
            $tournament = mysqli_fetch_assoc(get_tournament_by_id($tournament_id));
            echo "<div class='event'>
                <p>" . $tournament["INFO"] . "</p>
                <p>Signup deadline: " . $tournament["SIGNUP_DEADLINE"] . "</p>";
        }
    } else {
        echo "<p>You have not participated in any tournaments </p>";
    }
    ?>
</div>


</body>
</html>

<?php
mysqli_close($link);
?>/