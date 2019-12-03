<?php
require_once "../../private/initialise.php";

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
</head>
<body>
<h3>New Tournament</h3>
<a href="index.php">Cancel</a>
<form action="new_tournament.php" method="post">
<label>Name:
    <input type="text" name="name" placeholder="Tournament Name">
</label>
<br>
<label>Info:
    <input type="text" name="info" placeholder="Tournament Info">
</label>
<br>
<label>Signup Deadline:
    <input type="datetime-local" name="deadline">
</label>
<br>
<label>Organizer ID:
    <input type="text" name="organizer" placeholder="Organizer ID">
</label>
<br>
<input type="submit">
</form>

</body>
</html>