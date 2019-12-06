<?php
require_once "../../private/initialise.php";
?>

<html>
<head>
    <title>Chess society events</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php");

if (is_officer()) {
    echo "<a class=\"admin-button\" href=\"new.php\">Create new event</a>";
}
?>

<div id="events">
    <?php
    $date = date("Y-m-d H:i:s");
    $result_set = get_events(["date" => $date]);
    if (mysqli_num_rows($result_set)) {
        while ($event = mysqli_fetch_assoc($result_set)) {
            echo "<div class='event'>
                <h2>" . $event["name"] . "</h2>
                <span class='event-information'>Location: " . $event["location"] . "</span>
                <br/>
                <span class='event-information'>Time: " . $event["time"] . "</span>
                <p>" . $event["description"] . "</p>";
            if (is_officer()) {
                echo "<a class='admin-button' href='./edit.php?id=" . $event["id"] . "'>Edit</a>";
                echo "<a class='admin-button' href='./delete.php?id=" . $event["id"] . "'>Delete</a>";
            }
            echo "</div>";
        }
    } else {
        echo "<p>The chess society currently has no upcoming events </p>";
    }
    ?>
</div>

</body>
</html>

<?php
    mysqli_free_result($result_set);
    mysqli_close($link);
?>