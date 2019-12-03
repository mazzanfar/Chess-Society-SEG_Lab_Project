<?php
require_once "../../private/initialise.php";
$_SESSION['id'] = '1';
?>

    <html>
    <head>
        <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
        <title>Chess Society Tournaments</title>
    </head>
    <body>
    <h1>Chess society tournaments</h1>
    <a href="../">Back to home page</a>
    <br/>

    <div id="events">
        <?php
        $result_set = get_tournaments();
        if (mysqli_num_rows($result_set)) {
            while ($tournament = mysqli_fetch_assoc($result_set)) {
                echo "<div class='event'>
                <p>" . $tournament["INFO"] . "</p>
                <p>Signup deadline: " . $tournament["SIGNUP_DEADLINE"] . "</p>";

                if ($_SESSION["id"] === $tournament["ORGANIZER_ID"]) {
                    echo "<a href='./co_organizer.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Edit co-organizers</a><br/>";
                }

                if (!in_array($_SESSION['id'], get_tournament_participants($tournament['TOURNAMENT_ID'])) &&
                    new DateTime() < new DateTime($tournament['SIGNUP_DEADLINE'])) {
                    echo "<form action='signup.php'>
                            <input type='text' name='participant_id' hidden value='" . $_SESSION['id'] . "'/>
                            <input type='text' name='tournament_id' hidden value='" . $tournament['TOURNAMENT_ID'] . "'/>
                            <input type='submit' value='Sign up'/>
                          </form>";
                }

                echo "<a href='./edit.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Edit</a>
                <a href='./delete.php?id=" . $tournament["TOURNAMENT_ID"] . "'>Delete</a>
                </div>";
            }
        } else {
            echo "<p>The chess society currently has no upcoming tournaments</p>";
        }
        ?>
    </div>


    </body>
    </html>

<?php
mysqli_free_result($result_set);
mysqli_close($link);
?>/