<?php
require_once "../../private/initialise.php";

if(is_post_request()) {
    $tournament['tournament_id'] = $_POST['tournament_id'];
    $tournament['info'] = $_POST['info'];
    $tournament['deadline'] = $_POST['deadline'];
    $tournament['organizer'] = $_POST['organizer'];
    edit_tournament($tournament);
    redirect_to("tournaments/index.php");
} else {
    $tournament_id = $_GET['id'] ?? 1;
    $result_set = get_tournament_by_id($tournament_id);
    $tournament = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Edit Tournament</title>
</head>
<body>
    <h1><?php echo "Editing \"" . $tournament['name'] ."\"" ?></h1>
    <a href="index.php">Back</a>
    <form action="edit_tournament.php" method="post">
        <label>Name:
            <input type="text" name="name" value="<?php echo $tournament['name'] ?>">
        </label>
        <br>
        <label>Info:
            <input type="text" name="info" value="<?php echo $tournament['info'] ?>">
        </label>
        <br>
        <label>Deadline:
            <input type="datetime-local" name="deadline" value="<?php echo mysql_date_to_html_date($tournament['deadline']) ?>">
        </label>
        <br>
        <label>Organizer:
            <input type="text" name="deadline" value="<?php echo $tournament['organizer'] ?>">
        </label>
        <br>
        <input type="submit">
    </form>
</body>
</html>