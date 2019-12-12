<?php
require_once "../../private/initialise.php";
?>

<html>
<head>
    <title>Chess Society Tournaments</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/content.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php"); ?>
<?php
if(is_officer()){
    echo "<a href='new_tournament.php'>Create new tournament</a>";
}
?>

<div id="content">
    <?php
    $result_set = get_tournaments();
    if (mysqli_num_rows($result_set)) {
        while ($tournament = mysqli_fetch_assoc($result_set)) {
            $coorganizer_ids = Array();
            $coorganizer_result_set = get_tournament_coorganizers($tournament['TOURNAMENT_ID']);
            if ($coorganizer_result_set && mysqli_num_rows($result_set)) {
                while ($coorganizer = mysqli_fetch_assoc($result_set)) {
                    array_push($coorganizer_ids, $coorganizer["CO_ORGANIZER_ID"]);
                }
            }

            echo "<div class='content-item'>
            <p>" . $tournament["NAME"] . "</p>
            <p>" . $tournament["INFO"] . "</p>
            <p>Signup deadline: " . $tournament["SIGNUP_DEADLINE"] . "</p>";

            if (is_officer() && (int) $_SESSION["id"] === (int) $tournament["ORGANIZER_ID"]) {
                echo "<a href='./co_organizer.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Edit co-organizers</a><br/>";
            }

            if (is_logged_in() && !in_array($_SESSION['id'], get_tournament_participants($tournament['TOURNAMENT_ID'])) &&
                new DateTime() < new DateTime($tournament['SIGNUP_DEADLINE'])) {
                echo "<form action='signup.php'>
                        <input type='text' name='participant_id' hidden value='" . $_SESSION['id'] . "'/>
                        <input type='text' name='tournament_id' hidden value='" . $tournament['TOURNAMENT_ID'] . "'/>
                        <input type='submit' value='Sign up'/>
                      </form>";
            }

            if (in_array($_SESSION['id'], $coorganizer_ids) || (int) $_SESSION["id"] === (int) $tournament["ORGANIZER_ID"]) {
                echo "<a href='./edit_tournament.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Edit</a>
                <a href='./delete_tournament.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Delete</a><br>
                <a href='./view_participants.php?id=" . $tournament["TOURNAMENT_ID"] . "'>View participants</a>
                </div>";
            }
        }
    } else {
        echo "<p>The chess society currently has no upcoming tournaments</p>";
    }
    ?>
</div>


</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>


<?php
mysqli_free_result($result_set);
?>