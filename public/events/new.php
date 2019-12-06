<?php
require_once "../../private/initialise.php";

require_officer();

if (is_post_request()) {
    $event['name'] = $_POST['name'];
    $event['description'] = $_POST['description'];
    $event['location'] = $_POST['location'];
    $event['time'] = $_POST['time'];
    $event['available_from'] = $_POST['available_from'];
    $event['expires'] = $_POST['expires'];
    create_event($event);
    redirect_to("events/index.php");
}


?>

<html>
<head>
    <title>Chess society events</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>
<div class="wrapper">
<h2>New event</h2>
<a href="index.php">Back</a>
<form action="new.php" class="event-form" method="post">
    <label class="event-form-input">
        Name
        <input class="event-form-input" name="name" placeholder="Event name">
    </label>
    <br/>
    <label class="event-form-input">
        Description
        <input class="event-form-input" type="text" name="description" placeholder="Event description">
    </label>
    <br/>
    <label class="event-form-input">
        Location
        <input class="event-form-input" type="text" name="location" placeholder="Event location">
    </label>
    <br/>
    <label class="event-form-input">
        Time
        <input class="event-form-input" type="datetime-local" name="time">
    </label class="event-form-input">
    <br/>
    <label>
        Available from
        <input class="event-form-input" type="datetime-local" name="available_from">
    </label>
    <br/>
    <label class="event-form-input">
        Expires
        <input class="event-form-input" type="datetime-local" name="expires">
    </label>
    <br/>
    <input type="submit">

</form>

</div>
</body>
</html>