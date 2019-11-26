<?php
require_once "/../../private/initialise.php";
?>

<html>
<head>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
    <title>Chess society events</title>
</head>
<body>
<h1>Chess society events</h1>
<a href="new.php">Create new event</a> <!-- only show this for admins -->

<div id="events">
    <?php
    $date = date("Y-m-d H:i:s");
    // TODO: only use date option when not logged in as admine
    $result_set = get_events(["date" => $date]);
    if (mysqli_num_rows($result_set)) {
        while ($event = mysqli_fetch_assoc($result_set)) {
            echo "<div class='event'>
                <h2>" . $event["name"] . "</h2>
                <span class='event-information'>Location: " . $event["location"] . "</span>
                <br/>
                <span class='event-information'>Time: " . $event["time"] . "</span>
                <p>" . $event["description"] . "</p>
                
                <!--only show these if logged in as an administrator-->
                <a href='./edit.php?id=" . $event["id"] . "'>Edit</a>
                <a href='./delete.php?id=" . $event["id"] . "'>Delete</a>
              </div>";
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