<?php
require_once "../../private/initialise.php";

require_officer();
$validation_result = true;
if(is_post_request()) {
    $tournament['name'] = $_POST['name'];
    $tournament['info'] = $_POST['info'];
    $tournament['deadline'] = $_POST['deadline'];
    $tournament['organizer'] = $_POST['organizer'];
    $validation_result = validate_tournament($tournament);
    if ($validation_result === true) {
        create_tournament($tournament);
        redirect_to("tournaments/index.php");
    }
}
?>
<html>
<head>
    <title>Chess Society Tournaments</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>
<div class="content-inner">

<h2>New Tournament</h2>
<a href="index.php">Cancel</a>
<?php echo get_validation_errors($validation_result); ?>
<form class="content-form" action="new_tournament.php" method="post">
    <label class="content-form-input">Name
        <input class="content-form-input" type="text" name="name" placeholder="Tournament Name">
    </label>
    <br/>
    <label class="content-form-input">Info
        <input class="content-form-input" type="text" name="info" placeholder="Tournament Info">
    </label>
    <br/>
    <label class="content-form-input">Signup Deadline
        <input class="content-form-input" type="datetime-local" name="deadline">
    </label>
    <br/>
    <label>
        Organizer id:
        <?php $result_set = get_officers()?>
        <select name="organizer">
            <?php
            while ($officer = mysqli_fetch_assoc($result_set)) {
                $officer_id = $officer["id"];
                echo "<option value=' " . $officer_id . "'>" . $officer_id . "</option>";
            }
            ?>
        </select>
    </label>
    <br/>
    <input type="submit">
</form>
</div>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
