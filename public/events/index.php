<?php
//require_once "../private/db_functions.php";

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
    <tr><td>Location</td><td>Time</td><td>Expires</td><td></td></tr>
    <?php
    $result_set = getAllEvents();
    while($event = mysqli_fetch_assoc($result_set)) {
        echo "<tr>
                <td>" . $event["location"] . "</td>
                <td>" . $event["time"] . "</td>
                <td>" . $event["expires"] . "</td>
                <td><a href='./edit.php?id=" . $event["id"] . "'>Edit</a></td>
              </tr>";
    }
    ?>
</table>



</body>
</html>