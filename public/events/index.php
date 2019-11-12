<?php
require_once "../config.php";
?>

<html>
<head>
    <title>Chess society events</title>
</head>
<body>
<h1>
    Chess society events
</h1>
<table>
    <tr><td>Name</td><td>Location</td><td>Time</td><td>Expires</td><td></td></tr>
    <?php
    $result_set = get_all_events();
    while($event = mysqli_fetch_assoc($result_set)) {
        echo "<tr>
                <td>" . $event["name"] . "</td>
                <td>" . $event["location"] . "</td>
                <td>" . $event["time"] . "</td>
                <td>" . $event["expires"] . "</td>
                <td><a href='./edit.php?id=" . $event["id"] . "'>Edit</a></td>
              </tr>";
    }
    mysqli_free_result($result_set);
    mysqli_close($link);
    ?>
</table>



</body>
</html>