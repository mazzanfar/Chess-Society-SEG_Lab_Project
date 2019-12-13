<?php
require_once "../../private/initialise.php";
require_officer();
$id = $_GET['id'] ?? 1;
?>
<html>
<head>
    <title>Chess Society Tournaments</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php"); ?>

<h1><?php echo "Viewing tournament id '" . $id . "' participants" ?></h1>
<a href="index.php">Back</a>
<div id="organizers">
    <?php
    $coorganizer_ids = Array();

    $participants = get_tournament_participants($id);
    if (sizeof($participants) > 0) {
        echo "<table>";
        $headers = true;
        foreach ($participants as $participant) {
            if ($headers) {
                echo "<tr class='user'>
                    <th>Participant id</th>
                    <th></th>
                    </tr>";
                $headers = false;
            }
            echo "<tr>
                    <td>" . $participant . "</td>
                    <td><a href='../user/profile.php?id=" . $participant . "'>View profile</a></td>
                </tr>";
        }
        echo "<table>";
    } else {
        echo "<p>The tournament currently has no participants </p>";
    }
    ?>
</div>

</body>
</html>