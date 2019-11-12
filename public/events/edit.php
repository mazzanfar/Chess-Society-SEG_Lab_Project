<?php
require_once "../config.php";

if (is_post_request()) {
    $event['name'] = $_POST['name'];
    $event['id'] = $_POST['id'];
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
    <h1><?php echo $event['name'] ?></h1>
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
    <input name="id" value="<?php echo $id ?>" hidden>
    <br/>
    <input type="submit">

</form>


</body>
</html>