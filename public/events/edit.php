<?php
require_once "../../private/initialise.php";

if (is_post_request()) {
    $event['id'] = $_POST['id'];
    $event['name'] = $_POST['name'];
    $event['description'] = $_POST['description'];
    $event['location'] = $_POST['location'];
    $event['time'] = $_POST['time'];
    $event['available_from'] = $_POST['available_from'];
    $event['expires'] = $_POST['expires'];
    update_event($event);
    redirect_to("events/index.php");
} else {
    $id = $_GET['id'] ?? 1;
    $result_set = get_event_by_id($id);
    $event = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    mysqli_close($link);

}


?>

<html>
<head>
    <title>Chess society events</title>
</head>
<body>
    <h1><?php echo "Editing \"" . $event['name'] ."\"" ?></h1>
    <a href="index.php">Back</a>
    <form action="edit.php" method="post">
        <label>
            Name:
            <input type="text" name="name" value="<?php echo $event['name'] ?>">
        </label>
        <br/>
        <label>
            Description:
            <input type="text" name="description" value="<?php echo $event['description'] ?>">
        </label>
        <br/>
        <label>
            Location:
            <input type="text" name="location" value="<?php echo $event['location'] ?>">
        </label>
        <br/>
        <label>
            Time:
            <input type="datetime-local" name="time" value="<?php echo mysql_date_to_html_date($event['time']) ?>">
        </label>
        <br/>
        <label>
            Available from:
            <input type="datetime-local" name="available_from" value="<?php echo mysql_date_to_html_date($event['available_from']) ?>">
        </label>
        <br/>
        <label>
            Expires at:
            <input type="datetime-local" name="expires" value="<?php echo mysql_date_to_html_date($event['expires']) ?>">
        </label>
        <input name="id" value="<?php echo $id ?>" hidden>
        <br/>
        <input type="submit">

    </form>


</body>
</html>