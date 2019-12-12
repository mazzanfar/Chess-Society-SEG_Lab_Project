<?php
require_once "../../private/initialise.php";

require_officer();
$validation_result = true;
if(is_post_request()) {
    $tournament['tournament_id'] = $_POST['tournament_id'];
    $tournament['name'] = $_POST['name'];
    $tournament['info'] = $_POST['info'];
    $tournament['deadline'] = $_POST['deadline'];
    $tournament['organizer'] = $_POST['organizer'];
    $validation_result = validate_tournament($tournament);
    if ($validation_result === true) {
        edit_tournament($tournament);
        redirect_to("tournaments/index.php");
    }
}
$tournament_id = $_GET['id'] ?? 1;
$result_set = get_tournament_by_id($tournament_id);
$tournament = mysqli_fetch_assoc($result_set);
mysqli_free_result($result_set);
?>

<html>
<head>
    <title>Edit Tournament</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/content.css" type="text/css">
</head>
<body>
    <?php include("../../private/shared/chess_header.php") ?>
    <div class="content-inner">
    <h1><?php echo "Editing \"" . $tournament['NAME'] ."\"" ?></h1>
    <a href="index.php">Back</a>
    <?php if ($validation_result !== true) {
        echo "<div class='validation-errors'>";
        foreach ($validation_result as $error) {
            echo "<p class='validation-error'>" . $error . "</p>";
        }
        echo "</div>";
    }
    ?>
    <form class="content-form" action="edit_tournament.php" method="post">
        <label class="content-form-input">Name
            <input class="content-form-input" type="text" name="name" value="<?php echo $tournament['NAME'] ?>">
        </label>
        <br>
        <label class="content-form-input">Info
            <input class="content-form-input" type="text" name="info" value="<?php echo $tournament['INFO'] ?>">
        </label>
        <br>
        <label class="content-form-input">Deadline
            <input class="content-form-input" type="datetime-local" name="deadline" value="<?php echo mysql_date_to_html_date($tournament['SIGNUP_DEADLINE']) ?>">
        </label>
        <br>
        <label>
            Organizer id:
            <?php $result_set = get_officers()?>
            <select name="organizer">
                <?php
                while ($officer = mysqli_fetch_assoc($result_set)) {
                    $officer_id = $officer["id"];
                    echo "<option value=' " . $officer_id . ($officer_id === (int) $tournament["ORGANIZER_ID"] ? "selected" : "") . "'>" .
                        $officer_id . "</option>";
                }
                ?>
            </select>
        </label>
        <input name="tournament_id" value="<?php echo $tournament_id ?>" hidden>
        <br>
        <input type="submit">
    </form>
    </div>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
