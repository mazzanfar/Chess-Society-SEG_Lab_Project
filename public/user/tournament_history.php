<?php
require_once "../../private/initialise.php";
require_login();
?>

<html>
<head>
    <link rel="stylesheet" href="../stylesheets/content.css" type="text/css">
    <?php require_once("../../private/shared/chess_head.php") ?>
    <title>My tournaments</title>
</head>
<body>
<?php include("../../private/shared/chess_header.php"); ?>
<div class="content-inner">
<h1>My tournaments</h1>
<br/>

<div class="content">
    <?php
    $tournaments = get_tournaments_participated_in($_SESSION['id']);
    if (count($tournaments) > 0) {
        foreach ($tournaments as $tournament_id) {
            $tournament = mysqli_fetch_assoc(get_tournament_by_id($tournament_id));
            echo "<div class='content-item'>
                <p>" . $tournament["INFO"] . "</p>
                <p>Signup deadline: " . $tournament["SIGNUP_DEADLINE"] . "</p>" .
                "</div>";

        }
    } else {
        echo "<p>You have not participated in any tournaments </p>";
    }
    ?>
</div>
</div>

</body>
</html>

<?php
include("../../private/shared/chess_footer.php");
?>