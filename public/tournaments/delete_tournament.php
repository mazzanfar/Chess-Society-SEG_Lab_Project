<?php
require_once "../../private/initialise.php";

if(is_post_request()) {
    $delete = $_POST['delete'];
    if ($delete === "yes") {
        $tournament_id = $_POST['tournament_id'] ?? 1;
        delete_tournament($tournament_id);
    }
    redirect_to("tournaments/index.php");
} else {
    $tournament_id = $_GET['tournament_id'] ?? 1;
}
?>

<html>
<head>
    <title>Chess Society Tournaments</title>
</head>
<body>
    <h3><?php echo "Delete tournament with id '" . $tournament_id . "' ?"?></h3>
    <a href="index.php">Back</a>
    <form action="delete_tournament.php" method="post">
        <label>
            <input type="radio" name="delete" value="yes">
                Yes
        </label>
        <label>
            <input type="radio" name="delete" value="no">
                No
        </label>
        <input name="tournament_id" value="<?php echo $tournament_id ?>" hidden>
        <br>
        <input type="submit">
    </form>
</body>
</html>