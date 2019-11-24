<?php
require_once "../../private/initialise.php";

if (is_post_request()) {
    $delete = $_POST['delete'];
    if ($delete === "yes") {
        $tournament_id = $_POST['tournament_id'] ?? 1;
        $co_organizer_id = $_POST['co_organizer_id'] ?? 1;
        delete_co_organizer($tournament_id, $co_organizer_id);
    }

    redirect_to("tournaments/co_organizer.php");
} else {
    $tournament_id = $_GET['tournament_id'] ?? 1;
    $co_organizer_id = $_GET['co_organizer_id'] ?? 1;
}
?>

<html>
<head>
    <title>Chess society events</title>
</head>
<body>
<h1><?php echo "Delete organizer id '" . $co_organizer_id . "' from tournament id '" . $tournament_id . "' organizers?"?></h1>
<a href="index.php">Back</a>
<form action="delete_co_organizer.php" method="post">
    <label>
        <input type="radio" name="delete" value="no">
        No
    </label>
    <label>
        <input type="radio" name="delete" value="yes">
        Yes
    </label>
    <input name="tournament_id" value="<?php echo $tournament_id ?>" hidden>
    <input name="co_organizer_id" value="<?php echo $co_organizer_id ?>" hidden>
    <br/>
    <input type="submit">

</form>


</body>
</html>
