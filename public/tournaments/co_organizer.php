<?php
require_once "../../private/initialise.php";

if (is_post_request()) {
    $tournament_id = $_POST['tournament_id'];
    $co_organizer_id = $_POST['co_organizer_id'];
    add_tournament_co_organizer($tournament_id, $co_organizer_id);
    redirect_to("tournaments/co_organizer.php");
} else {
    $id = $_GET['id'] ?? 1;
    $result_set = get_tournament_by_id($id);
    $tournament = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);

}

?>

<html>
<head>
    <title>Chess society tournaments</title>
</head>
<body>
<h1><?php echo "Editing tournament id '" . $id . "'" ?></h1>
<a href="index.php">Back</a>
<?php
if (empty($tournament)) {
    echo "<p>No tournament with id " . $id . " found</p>";
}

?>
<div id="organizers">
    <?php
    $coorganizer_ids = Array();

    $result_set = get_tournament_cooragnizers($id);
    if ($result_set && mysqli_num_rows($result_set)) {
        echo "<table>";
        $headers = true;
        while ($coorganizer = mysqli_fetch_assoc($result_set)) {
            array_push($coorganizer_ids, $coorganizer["CO_ORGANIZER_ID"]);
            if ($headers) {
                echo "<tr class='user'>
                    <th>Co-organizer id</th>
                    <th></th>
                    </tr>";
                $headers = false;
            }
            echo "<tr class='user'>
                <td>" . $coorganizer["CO_ORGANIZER_ID"] . "</td>
                <td><a href='delete_co_organizer.php?tournament_id=" . $id .
                "&co_organizer_id=" . $coorganizer["CO_ORGANIZER_ID"] . "'>Remove</a></td>
                </tr>";
        }
        echo "<table>";
    } else if ($result_set) {
        echo "<p>The tournament currently has no members co-organizers </p>";
    }
    ?>
</div>

<form action="co_organizer.php" method="post">
    <label>
        Add co-organizer:
        <?php $result_set = get_officers()?>
        <select name="co_organizer_id">
            <?php
            while ($officer = mysqli_fetch_assoc($result_set)) {
                $officer_id = $officer["OFFICER_ID"];
                if (!in_array($officer_id, $coorganizer_ids) && $tournament['ORGANIZER_ID'] !== $officer_id) {
                    echo "<option value=' " . $officer_id . "'>" . $officer_id . "</option>";
                }
            }
            ?>
        </select>
    </label>
    <input name="tournament_id" value="<?php echo $tournament['TOURNAMENT_ID'] ?>" hidden>
    <br/>
    <input type="submit">

</form>

</body>
</html>