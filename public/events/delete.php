<?php
require_once "../config.php";

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
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Chess society events</title>
</head>
<body>
<h1><?php echo "Delete event \"" . $event['name'] ."\"?" ?></h1>
<a href="index.php">Back</a>
<form action="delete.php" method="post">
    <label>
        <input type="radio" name="delete" value="no">
        No
    </label>
    <label>
        <input type="radio" name="delete" value="yes">
        Yes
    </label>
    <input name="id" value="<?php echo $id ?>" hidden>
    <br/>
    <input type="submit">

</form>


</body>
</html>