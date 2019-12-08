<?php
require_once "../../private/initialise.php";

require_officer();
if(is_post_request()) {
    $tournament['name'] = $_POST['name'];
    $tournament['info'] = $_POST['info'];
    $tournament['deadline'] = $_POST['deadline'];
    $tournament['organizer'] = $_POST['organizer'];
    create_tournament($tournament);
    redirect_to("tournaments/index.php");
}
?>
<html>
<head>
    <title>Chess Society Tournaments</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>
<div class="event-content">

<h2>New Tournament</h2>
<a href="index.php">Cancel</a>
<form class="event-form" action="new_tournament.php" method="post">
    <label class="event-form-input">Name
        <input class="event-form-input" type="text" name="name" placeholder="Tournament Name">
    </label>
    <br/>
    <label class="event-form-input">Info
        <input class="event-form-input" type="text" name="info" placeholder="Tournament Info">
    </label>
    <br/>
    <label class="event-form-input">Signup Deadline
        <input class="event-form-input" type="datetime-local" name="deadline">
    </label>
    <br/>
    <label class="event-form-input">Organizer ID
        <input class="event-form-input" type="text" name="organizer" placeholder="Organizer ID">
    </label>
    <br/>
    <input type="submit">
</form>
</div>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
