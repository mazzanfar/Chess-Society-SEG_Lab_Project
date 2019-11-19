<?php
require_once "../config.php";

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
</head>
<body>
<h1>New event</h1>
<a href="index.php">Back</a>
<form action="new.php" method="post">
    <label>
        Name:
        <input type="text" name="name" placeholder="Event name">
    </label>
    <br/>
    <label>
        Description:
        <input type="text" name="description" placeholder="Event description">
    </label>
    <br/>
    <label>
        Location:
        <input type="text" name="location" placeholder="Event location">
    </label>
    <br/>
    <label>
        Time:
        <input type="datetime-local" name="time">
    </label>
    <br/>
    <label>
        Available from:
        <input type="datetime-local" name="available_from">
    </label>
    <br/>
    <label>
        Expires:
        <input type="datetime-local" name="expires">
    </label>
    <br/>
    <input type="submit">

</form>


</body>
</html>