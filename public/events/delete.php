<?php
require_once "../../private/initialise.php";

require_officer();

if (is_post_request()) {
    $delete = $_POST['delete'];
    if ($delete === "yes") {
        $id = $_POST['id'];
        delete_event($id);
    }

    redirect_to("events/index.php");
} else {
    $id = $_GET['id'] ?? 1;
    $result_set = get_event_by_id($id);
    $event = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
}
?>

<html>
<head>
    <title>Chess society events</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>

<div class="content-inner">
<h1><?php echo "Delete event \"" . $event['name'] ."\"?" ?></h1>
<form class="content-form" action="delete.php" method="post">
    <label class="content-form-radio">
        <input type="radio" name="delete" value="no">
        No
    </label>
    <label class="content-form-radio">
        <input type="radio" name="delete" value="yes">
        Yes
    </label>
    <input name="id" value="<?php echo $id ?>" hidden>
    <br/>
    <input type="submit" class="content-submit" value="Confrim">

</form>
</div>

</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
