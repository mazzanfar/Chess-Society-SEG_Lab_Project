<?php
require_once "../../private/initialise.php";
$tournament_id = $_GET['tournament_id'];
$participant_id = $_GET['participant_id'];
insert_tournament_participant($tournament_id, $participant_id);
redirect_to("tournaments/index.php");
?>