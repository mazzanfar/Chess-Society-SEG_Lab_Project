<?php
require_once "../../private/initialise.php";

require_officer();
$validation_result = true;
if (is_post_request()) {
    $event['name'] = $_POST['name'];
    $event['description'] = $_POST['description'];
    $event['location'] = $_POST['location'];
    $event['time'] = $_POST['time'];
    $event['available_from'] = $_POST['available_from'];
    $event['expires'] = $_POST['expires'];

    $validation_result = validate_event($event);
    if ($validation_result === true) {
        create_event($event);
        redirect_to("events/index.php");
    }
}


?>

<html>
<head>
    <title>Chess society events</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/content.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>
<div class="content-inner">
<h2>New event</h2>
<a href="index.php">Back</a>
<?php if ($validation_result !== true) {
    echo "<div class='validation-errors'>";
    foreach ($validation_result as $error) {
        echo "<p class='validation-error'>" . $error . "</p>";
    }
    echo "</div>";

}?>
<form action="new.php" class="content-form" method="post">
    <label class="content-form-input">
        Name
        <input class="content-form-input" name="name" placeholder="Event name">
    </label>
    <br/>
    <label class="content-form-input">
        Description
        <input class="content-form-input" type="text" name="description" placeholder="Event description">
    </label>
    <br/>
    <label class="content-form-input">
        Location
        <input class="content-form-input" type="text" name="location" placeholder="Event location">
    </label>
    <br/>
    <label class="content-form-input">
        Time
        <input class="content-form-input" type="datetime-local" name="time">
    </label class="event-form-input">
    <br/>
    <label>
        Available from
        <input class="content-form-input" type="datetime-local" name="available_from">
    </label>
    <br/>
    <label class="content-form-input">
        Expires
        <input class="content-form-input" type="datetime-local" name="expires">
    </label>
    <br/>
    <input type="submit">

</form>
</div>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
