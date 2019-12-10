<?php
require_once "../../private/initialise.php";
require_officer();
?>

<html>
<head>
    <title>Chess society events</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
    <link rel="stylesheet" href="../stylesheets/events.css" type="text/css">
</head>
<body>
<?php include("../../private/shared/chess_header.php"); ?>

<div class="event-content">
    <h1>Chess society admin page</h1>
    <a href="../">Back to home page</a>
    <br/>
    <?php
    $result_set = get_users();
    if (mysqli_num_rows($result_set)) {
        echo "<table>";
        $headers = true;
        while ($user = mysqli_fetch_assoc($result_set)) {
            if ($headers) {
                echo "<tr class='user'>
                <th>Member ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Profile</th>
                </tr>";
                $headers = false;
            }
            echo "<tr class='user'>
            <td>" . $user["id"] . "</td>
            <td>" . $user["username"] . "</td>
            <td>" . $user["full_name"] . "</td>
            <td><a href='../user/profile.php?id=" . $user["id"] . "'>View</a></td>
            </tr>";
        }
        echo "<table>";
    } else {
        echo "<p>The chess society currently has no members </p>";
    }
    ?>
</div>

</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>

<?php
mysqli_free_result($result_set);
mysqli_close($link);
?>