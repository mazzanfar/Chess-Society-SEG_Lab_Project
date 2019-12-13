<?php
require_once "../../private/initialise.php";

require_officer();

$validation_result = true;
if (is_post_request()) {
    $event['id'] = $_POST['id'];
    $event['name'] = $_POST['name'];
    $event['description'] = $_POST['description'];
    $event['location'] = $_POST['location'];
    $event['time'] = $_POST['time'];
    $event['available_from'] = $_POST['available_from'];
    $event['expires'] = $_POST['expires'];

    $validation_result = validate_event($event);
    if ($validation_result === true) {
        update_event($event);
        redirect_to("events/index.php");
    }
    $result_set = get_event_by_id($_POST['id']);
    $db_event = mysqli_fetch_assoc($result_set);
    $title = $db_event['name'];
} else {
    $id = $_GET['id'] ?? 1;
    $result_set = get_event_by_id($id);
    $event = mysqli_fetch_assoc($result_set);
    $title = $event['name'];
    mysqli_free_result($result_set);

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
    <h1><?php echo "Editing \"" . $title ."\"" ?></h1>
    <a href="index.php">Back</a>
    <?php echo get_validation_errors($validation_result); ?>

    <form class="content-form" action="edit.php" method="post">
        <label class="content-form-input">
            Name
            <input class="content-form-input" type="text" name="name" value="<?php echo $event['name'] ?>">
        </label>
        <br/>
        <label class="content-form-input">
            Description
            <input class="content-form-input" type="text" name="description" value="<?php echo $event['description'] ?>">
        </label>
        <br/>
        <label class="content-form-input">
            Location
            <input class="content-form-input" type="text" name="location" value="<?php echo $event['location'] ?>">
        </label>
        <br/>
        <label class="content-form-input">
            Time
            <input class="content-form-input" type="datetime-local" name="time" value="<?php echo mysql_date_to_html_date($event['time']) ?>">
        </label>
        <br/>
        <label class="content-form-input">
            Available from
            <input class="content-form-input" type="datetime-local" name="available_from" value="<?php echo mysql_date_to_html_date($event['available_from']) ?>">
        </label>
        <br/>
        <label class="content-form-input">
            Expires at
            <input class="content-form-input" type="datetime-local" name="expires" value="<?php echo mysql_date_to_html_date($event['expires']) ?>">
        </label>
        <input name="id" value="<?php echo $id ?>" hidden>
        <br/>
        <input type="submit">

    </form>
    </div>


</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
